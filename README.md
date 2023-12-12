# Handyman Helpers 

## Overview

The Handyman Helpers is a web platform that connects homeowners with skilled handymen to help with various home repair and improvement projects. It utilizes Laravel as the backend framework and JavaScript for enhanced interactivity on the front end.

## Features

- Homeowner profiles
  - Create detailed home profiles listing project needs
  - Upload photos related to project
  - Get quotes from handymen
  - Leave reviews of completed work
- Handyman profiles
  - Create detailed handyman profiles showing skills/experience  
  - Display availabilty status 
  - Set rates per hour
  - Get notified when new home projects match skills
- Messaging system
  - Secure in-app messaging between homeowners and handymen
  - Discuss project details and specifications
- Payment processing
  - Integrated online payments via Stripe
  - Handymen get paid upon homeowner's approval
  - Homeowners able to tip for exceptional service
  
## Tech Stack

**Backend**

- PHP 8.1
- Laravel 10x
  - Eloquent ORM
  - Middleware
  - Routing 
  - Authentication
  - Database migrations

**Frontend** 

- JavaScript 
  - DOM Manipulation
  - Form Validation
- Bootstrap 5
  - Styling & Responsiveness

**Database**

- MySQL
- Redis (Caching)

**External Services**

- Stripe Payments
- AWS S3 Storage

**Testing**

- PHPUnit
- Laravel Dusk Browser Tests

## Getting Started

- Clone repo 
- Configure environment variables
- Install Composer dependencies
- Migrate databases
- Install NPM dependencies 
- Compile assets
- Serve application
