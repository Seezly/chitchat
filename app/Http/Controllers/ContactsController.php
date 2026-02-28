<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use App\Models\User;

use function PHPUnit\Framework\isNull;

class ContactsController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        $currentUserId = auth()->id();

        $contacts = User::join('contacts', function (JoinClause $join) {
            $join->on('users.id', '=', 'contacts.sender_id')
                ->orOn('users.id', '=', 'contacts.receiver_id');
        })
            ->where(function ($query) use ($currentUserId) {
                $query->where('contacts.sender_id', $currentUserId)
                    ->orWhere('contacts.receiver_id', $currentUserId);
            })
            ->whereNotNull('contacts.accepted_at')
            ->where('users.id', '!=', $currentUserId)
            ->select('users.name', 'users.profile_pic', 'users.status', 'users.id')
            ->paginate(6);

        $friendRequests = $user
            ->join('contacts', function (JoinClause $join) {
                $join->on('users.id', '=', 'contacts.receiver_id');
            })
            ->select('users.name', 'users.profile_pic', 'users.status', 'users.id', 'contacts.id as contact_id')
            ->where(function ($query) {
                $query->where('contacts.accepted_at', '=', 'NULL')
                    ->where('contacts.rejected_at', '=', 'NULL');
            })
            ->paginate(6);

        return view('dashboard.contacts', ['contacts' => $contacts, 'requests' => $friendRequests]);
    }

    public function search(Request $request)
    {
        $currentUserId = auth()->id();

        if (!$request->filled('q')) {
            return response()->json(['success' => false, 'errors' => 'No query was found.']);
        }

        $q = $request->q;

        $contactsUserIds = Contact::where(function ($query) use ($currentUserId) {
            $query->where('sender_id', $currentUserId)
                ->orWhere('receiver_id', $currentUserId);
        })->whereNotNull('accepted_at')
            ->get()
            ->flatMap(function ($contact) {
                return [$contact->sender_id, $contact->receiver_id];
            })
            ->unique()
            ->reject(function ($id) use ($currentUserId) {
                return $id == $currentUserId;
            })
            ->values()
            ->toArray();

        $users = User::whereNotIn('id', [$currentUserId])
            ->when(!empty($contactsUserIds), function ($query) use ($contactsUserIds) {
                $query->whereNotIn('id', $contactsUserIds);
            })
            ->where(function ($query) use ($q) {
                $query->where('username', "LIKE", "%{$q}%")
                    ->orWhere('email', "LIKE", "%{$q}%");
            })
            ->paginate(6);

        return response()->json(['success' => true, 'data' => $users]);
    }

    public function store(Request $request)
    {
        $currentUserId = auth()->id();

        if (!$request->filled('_id')) {
            return response()->json(['success' => false, 'errors' => 'No user id was found.']);
        }

        $receiverId = $request->_id;

        Contact::create([
            'sender_id' => $currentUserId,
            'receiver_id' => $receiverId
        ]);

        return response()->json(['success' => true]);
    }

    public function update(Request $request)
    {
        if (!$request->filled('_id')) {
            return response()->json(['success' => false, 'errors' => 'No contact id was found.']);
        }

        if (!$request->filled('_response')) {
            return response()->json(['success' => false, 'errors' => 'No response to friend request was found.']);
        }

        $contactId = $request->_id;
        $contactResponse = $request->_response;

        if ($contactResponse === 'accept') {
            Contact::find($contactId)->update(['accepted_at' => now()]);
        } elseif ($contactResponse === 'reject') {
            Contact::find($contactId)->update(['rejected_at' => now()]);
        }

        return response()->json(['success' => true]);
    }
}
