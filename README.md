Lightweight AWS Cognito Authentication System using PHP (LAMP stack).

# Cognito Authentication with LAMP Stack

This project demonstrates a secure user authentication system using AWS Cognito integrated with a PHP (LAMP stack) backend.

The repository focuses on **backend–cloud integration, security best practices, and clean project structure**, suitable for real-world applications.

---

## Architecture Overview

Frontend (HTML Forms)  
→ PHP Backend (Apache)  
→ AWS SDK for PHP  
→ AWS Cognito (User Pool)

---

## Authentication Flow

1. User signs up using email and password
2. PHP backend sends request to AWS Cognito
3. Cognito creates the user and sends a confirmation code via email
4. User confirms the account using the verification code
5. User logs in using email and password
6. AWS Cognito authenticates the user and returns JWT tokens
   - ID Token
   - Access Token
   - Refresh Token


---

## Tech Stack

- PHP (LAMP Stack)
- Apache (XAMPP)
- AWS SDK for PHP
- AWS Cognito
- HTML / CSS
- Git & GitHub

---

## Security Practices

- AWS credentials stored in `.env` file
- `.env` excluded using `.gitignore`
- No secrets committed to the repository
- Configuration separated from application logic

---

## Project Structure

```text
cognito-auth-lamp-stack/
│
├── backend/
│   └── signup.php
│
├── frontend/
│   └── signup.html
│
├── config/
│   └── cognito.php
│
├── vendor/          (ignored in Git)
├── .env             (ignored in Git)
├── .gitignore
├── composer.json
├── README.md
---

## Author

**Nikhil**
