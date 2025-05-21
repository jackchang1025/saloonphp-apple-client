<?php

namespace Weijiajia\SaloonphpAppleClient\Helpers;

use Random\RandomException;

class GeneratePassword
{
    /**
     * Generate a secure random password with specific requirements.
     *
     * @param int $minLength Minimum password length (must be at least 4)
     * @param int $maxLength Maximum password length
     *
     * @return string The generated password
     *
     * @throws \InvalidArgumentException If invalid length parameters are provided
     * @throws RandomException           If random_int fails
     */
    public static function generatePassword(int $minLength = 8, int $maxLength = 20): string
    {
        if ($minLength < 8) {
            throw new \InvalidArgumentException('Minimum length must be at least 8 to accommodate required character types');
        }

        if ($minLength > $maxLength) {
            throw new \InvalidArgumentException('Minimum length cannot be greater than maximum length');
        }

        // Define character sets
        $charSets = [
            'uppercase' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            'lowercase' => 'abcdefghijklmnopqrstuvwxyz',
            'numbers' => '0123456789',
            'special' => '!@#$%^&*()_+-=[]{}|;:,.<>?',
        ];

        // Determine password length
        $length = random_int($minLength, $maxLength);

        // Start with empty password
        $password = '';

        foreach ($charSets as $chars) {
            $password .= $chars[random_int(0, strlen($chars) - 1)];
        }

        // Create a combined character set for remaining characters
        $allChars = implode('', $charSets);
        $allCharsLength = strlen($allChars) - 1;

        while (strlen($password) < $length) {
            $nextChar = $allChars[random_int(0, $allCharsLength)];
            if ($nextChar !== substr($password, -1)) {
                $password .= $nextChar;
            }
        }

        // Shuffle the password to avoid predictable patterns
        return str_shuffle($password);
    }
}
