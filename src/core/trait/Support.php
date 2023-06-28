<?php

declare(strict_types=1);

namespace Outline\Plain\Html\Core\Trait;

/**
 * @author Jefferson Silva Santos
 */
trait Support
{
    protected function check_keywords(bool|string|null $subject): bool
    {
        if (is_bool($subject) || is_null($subject)) return true;
        return (bool)preg_match("#^(false|true|bool|string|int|object|null)+#i", $this->filter_spaces($subject));
    }

    /**
     * @param string $subject
     * @param string $position
     * @return string
     */
    protected function filter_spaces(string $subject, string $position = "a"): string
    {
        return match ($position) {
            "r" => rtrim($subject),
            "l" => ltrim($subject),
            "a" => preg_replace("#\s#", "", $subject),
            default => $subject
        };
    }

    /**
     * @param bool|string|null $subject
     * @param string|null $replace
     * @return string
     */
    protected function filter_keywords(bool|null|string $subject, string|null $replace = null): string
    {
        $replace = is_null($replace) ? "" : $replace;
        if (is_bool($subject) || is_null($subject)) return $replace;
        if ($this->check_keywords($subject)) {
            $subject = preg_replace("#^(false|true|bool|string|int|object|null)+#i",
                $replace,
                $this->filter_spaces($subject));
        }
        return $subject;
    }

    /**
     * @param bool|string $subject
     * @return bool "true" or "false"
     */
    protected function conversion_bool(bool|string $subject): bool
    {
        if (is_bool($subject)) return $subject;
        return match ($subject) {
            "true"  => true,
            default => false
        };
    }

    /**
     * @param bool|string $subject
     * @return string "on" or "off"
     */
    protected function on_off(bool|string $subject): string
    {
        if (is_string($subject)) {
            $subject = match ($subject) {
                "true",
                    "1",
                    "on",
                    "On",
                    "ON",
                    "oN" => "on",
                default => "off"
            };
        }

        if (is_bool($subject)) {
            $subject = match ($subject) {
                true => "on",
                default => "off"
            };
        }
        return $subject;
    }

    /**
     * @param $subject
     * @return string "string numeric"
     */
    protected function conversion_numeric($subject): string
    {
        return is_numeric($subject) ? "$subject" : "0";
    }

    /**
     * @return string an empty space \x20
     */
    protected function space(): string
    {
        return "\x20";
    }
}