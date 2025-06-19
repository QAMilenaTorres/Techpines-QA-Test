# Techpines QA Test

This project contains automated and manual tests for a fictional ERP system module for client registration and listing.  
It was created as part of a technical challenge for the QA Analyst position at Techpines.

## Features

- Manual test cases covering main flows and error scenarios  
- Automated API test simulations using Laravel's testing tools  
- Validation rules for required fields and unique CNPJ  
- Client listing with pagination and filters  
- Approval and rejection of client registrations (simulated)

## Getting Started

### Prerequisites

- PHP 8.1 or higher  
- Composer  
- Git

### Setup

1. Clone the repository:
   git clone https://github.com/QAMilenaTorres/Techpines-QA-Test.git
   cd Techpines-QA-Test

2. Install dependencies:   
composer install

3. Copy the environment file and generate the app key:
cp .env.example .env
php artisan key:generate

4. Run the tests:
php artisan test

Notes
- No real backend or database is implemented — API calls are simulated in tests.
- The project is prepared to demonstrate knowledge in test automation with Laravel.