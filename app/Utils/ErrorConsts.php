<?php

namespace App\Utils;

class ErrorConsts
{
    const VALID_EMAIL = "Invalid email format";
    const VALID_EMAIL_UNIQUE = "A user with this email address already exists!";
    const VALID_PASSWORD_MIN = "Minimum password length";
    const VALID_PASSWORD_CONFIRMED = "Passwords do not match";
    const VALID_EMAIL_AND_PASSWORD = "Wrong login or password";

    const REQUEST_ERROR = "Request returned nothing";
}