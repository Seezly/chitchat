# ChitChat - Real-time Chat Application

This project was made for the sake of learning Laravel making a full-stack project where the quantity of features to practice could be large. So I thought that a real-time chat app would be a great option being that a chat app could be as simple or fully-featured as the developer wants or the application requires. I began only with WebSockets implementation using Laravel Reverb, many-to-many relationship table with conversation_user table, MVC approach, simple and infinite scrolling pagination (for the conversations), database indexes, foreign and unique keys, middlewares, soft deletes in conversations and messages table, rate limiting for the messages and friend requests endpoints.

## Why?

I had a very long time wanting to learn Laravel as I think is a really great and useful framework and I took this last stage in the Global Internship at Diverta's as the signal to make a project to learn it, although is quite simple and I didn't finished to the extent that I wanted to, is a good start point and will be a project that I'll be working on from now on implementing new knowledge and making a good full-stack project for my portfolio.

## Tech Stack

- Laravel
- Laravel Reverb (WebSockets broadcasting)
- MySQL
- TailwindCSS
- Vanilla JavaScript
- Blade

As a matter of fact, I will be including in an near future Laravel LiveWire components to make the real-time events and changes smoothier.

## How can I install this project?

First things first: you have to clone this repo using the terminal and running the following commands:

`git clone https://github.com/Seezly/chitchat.git`

Then, please do:

`cd chitchat`

`mv .env.example .env` (this will copy the .env.example file to .env so you can modify all the env variables)

`composer install` (this will install all the dependencies)

`npm install && npm run build` (this will install and build all the Vite dependencies and files),

`composer run dev` (this will turn up the server locally, it runs the server, queue and websockets server)

## To-Do list for this project

-[] Make it 100% responsive
-[] Edit messages
-[] Delete specific (or specifics) messages
-[] Separate elements in components (Views)
-[] Separate logic to specific files and function translation (JavaScript files)
-[] Separate events for messages, conversations and user states (and also creating those that doesn't exist)
-[] Improve database tables (adding cache columns to conversations, improve indexes for future features)
-[] Optimize queries
-[] Add search message feature on conversation
-[] Add search conversation/message on sidebar
-[] Add real-time notifications
-[] Add friend suggestions
