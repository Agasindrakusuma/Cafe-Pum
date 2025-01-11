<?php

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace CodeIgniter\Validation;

use DateTime;

/**
 * Format validation Rules.
 */
class FormatRules
{
    /**
     * Alpha
     */
    public function alpha(?string $str = null): bool
    {
        return ctype_alpha($str);
    }

    /**
     * Alpha with spaces.
     *
     * @param string|null $value Value.
     *
     * @return bool True if alpha with spaces, else false.
     */
    public function alpha_space(?string $value = null): bool
    {
        if ($value === null) {
            return true;
        }

        return (bool) preg_match('/\A[A-Z ]+\z/i', $value);
    }

    /**
     * Alphanumeric with underscores and dashes
     */
    public function alpha_dash(?string $str = null): bool
    {
        return (bool) preg_match('/\A[a-z0-9_-]+\z/i', $str);
    }

    /**
     * Alphanumeric, spaces, and a limited set of punctuation characters.
     * Accepted punctuation characters are: ~ tilde, ! exclamation,
     * # number, $ dollar, % percent, & ampersand, * asterisk, - dash,
     * _ underscore, + plus, = equals, | vertical bar, : colon, . period
     * ~ ! # $ % & * - _ + = | : .
     *
     * @param string $str
     *
     * @return bool
     */
    public function alpha_numeric_punct($str)
    {
        return (bool) preg_match('/\A[A-Z0-9 ~!#$%\&\*\-_+=|:.]+\z/i', $str);
    }

    /**
     * Alphanumeric
     */
    public function alpha_numeric(?string $str = null): bool
    {
        return ctype_alnum($str);
    }

    /**
     * Alphanumeric w/ spaces
     */
    public function alpha_numeric_space(?string $str = null): bool
    {
        return (bool) preg_match('/\A[A-Z0-9 ]+\z/i', $str);
    }

    /**
     * Any type of string
     *
     * @param string|null $str
     */
    public function string($str = null): bool
    {
        return is_string($str);
    }

    /**
     * Decimal number
     */
    public function decimal(?string $str = null): bool
    {
        return (bool) preg_match('/\A[-+]?\d{0,}\.?\d+\z/', $str);
    }

    /**
     * String of hexadecimal characters
     */
    public function hex(?string $str = null): bool
    {
        return ctype_xdigit($str);
    }

    /**
     * Integer
     */
    public function integer(?string $str = null): bool
    {
        return (bool) preg_match('/\A[\-+]?\d+\z/', $str);
    }

    /**
     * Is a Natural number (0,1,2,3, etc.)
     */
    public function is_natural(?string $str = null): bool
    {
        return ctype_digit($str);
    }

    /**
     * Is a Natural number, but not zero (1,2,3, etc.)
     */
    public function is_natural_no_zero(?string $str = null): bool
    {
        return $str !== '0' && ctype_digit($str);
    }

    /**
     * Numeric
     */
    public function numeric(?string $str = null): bool
    {
        return (bool) preg_match('/\A[\-+]?\d*\.?\d+\z/', $str);
    }

    /**
     * Compares value against a regular expression pattern.
     */
    public function regex_match(?string $str, string $pattern): bool
    {
        if (strpos($pattern, '/') !== 0) {
            $pattern = "/{$pattern}/";
        }

        return (bool) preg_match($pattern, $str);
    }

    /**
     * Validates that the string is a valid timezone as per the
     * timezone_identifiers_list function.
     *
     * @param string $str
     */
    public function timezone(?string $str = null): bool
    {
        return in_array($str, timezone_identifiers_list(), true);
    }

    /**
     * Valid Base64
     */
    public function valid_base64(?string $str = null): bool
    {
        return base64_encode(base64_decode($str, true)) === $str;
    }

    /**
     * Valid JSON
     */
    public function valid_json(?string $str = null): bool
    {
        json_decode($str);
        return json_last_error() === JSON_ERROR_NONE;
    }

    /**
     * Checks for a correctly formatted email address
     *
     * @param string $str
     */
    public function valid_email(?string $str = null): bool
    {
        if (function_exists('idn_to_ascii') && defined('INTL_IDNA_VARIANT_UTS46') && preg_match('#\A([^@]+)@(.+)\z#', $str, $matches)) {
            $str = $matches[1] . '@' . idn_to_ascii($matches[2], 0, INTL_IDNA_VARIANT_UTS46);
        }

        return (bool) filter_var($str, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Validate a comma-separated list of email addresses.
     */
    public function valid_emails(?string $str = null): bool
    {
        foreach (explode(',', $str) as $email) {
            $email = trim($email);
            if ($email === '') {
                return false;
            }

            if ($this->valid_email($email) === false) {
                return false;
            }
        }

        return true;
    }

    /**
     * Validate an IP address
     */
    public function valid_ip(?string $ip = null, ?string $which = null): bool
    {
        if (empty($ip)) {
            return false;
        }

        $which = strtolower($which ?? '');

        switch ($which) {
            case 'ipv4':
                $which = FILTER_FLAG_IPV4;
                break;
            case 'ipv6':
                $which = FILTER_FLAG_IPV6;
                break;
            default:
                $which = null;
                break;
        }

        if ($which === null) {
            return (bool) filter_var($ip, FILTER_VALIDATE_IP) || (!ctype_print($ip) && (bool) filter_var(inet_ntop($ip), FILTER_VALIDATE_IP));
        }

        return (bool) filter_var($ip, FILTER_VALIDATE_IP, $which) || (!ctype_print($ip) && (bool) filter_var(inet_ntop($ip), FILTER_VALIDATE_IP, $which));
    }


    /**
     * Checks a string to ensure it is (loosely) a URL.
     */
    public function valid_url(?string $str = null): bool
    {
        if (empty($str)) {
            return false;
        }

        if (preg_match('/^(?:([^:]*)\:)?\/\/(.+)$/', $str, $matches)) {
            if (! in_array($matches[1], ['http', 'https'], true)) {
                return false;
            }

            $str = $matches[2];
        }

        $str = 'http://' . $str;

        return filter_var($str, FILTER_VALIDATE_URL) !== false;
    }

    /**
     * Checks a URL to ensure it's formed correctly.
     */
    public function valid_url_strict(?string $str = null, ?string $validSchemes = null): bool
    {
        if (empty($str)) {
            return false;
        }

        $scheme = strtolower(parse_url($str, PHP_URL_SCHEME));
        $validSchemes = explode(',', strtolower($validSchemes ?? 'http,https'));

        return in_array($scheme, $validSchemes, true)
            && filter_var($str, FILTER_VALIDATE_URL) !== false;
    }

    /**
     * Checks for a valid date and matches a given date format
     */
    public function valid_date(?string $str = null, ?string $format = null): bool
    {
        if (empty($format)) {
            return (bool) strtotime($str);
        }

        $date = DateTime::createFromFormat($format, $str);

        return (bool) $date && DateTime::getLastErrors()['warning_count'] === 0 && DateTime::getLastErrors()['error_count'] === 0;
    }
}
