<?php

declare(strict_types=1);

namespace Outline\Plain\Html\Core\Trait;

/**
 * @author Jefferson Silva Santos
 */
trait Support
{
    /**
     * @var string
     */
    private string $pattern_one = "#^(false|true|bool|string|int|object|null)+$#i";

    /**
     * @var string
     */
    private string $pattern_two = "#\s#";

    /**
     * @param bool|string|null $subject
     * @return bool
     */
    protected function check_keywords(bool|string|null $subject): bool
    {
        if (is_bool($subject) || is_null($subject)) return true;
        return preg_match($this->pattern_one, $this->filter_spaces($subject));
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
            "a" => preg_replace($this->pattern_two, "", $subject),
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
        if ($this->filter_spaces($subject)) {
            $subject = preg_replace($this->pattern_one, $replace, $this->filter_spaces($subject));
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
     * @return string "numeric"
     */
    protected function conversion_numeric($subject): string
    {
        return is_numeric($subject) ? "$subject" : "0";
    }
}