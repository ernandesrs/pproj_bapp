<?php

namespace App\Livewire\Helpers;

class Feedback
{
    static string $flashFeedbackKey = 'app_flash_feedback';

    public bool $flash = false;

    public string $text;

    public string $type = 'default';

    public ?string $title = null;

    public array $actions = [];

    /**
     * Add a success feddback
     *
     * @param string $text
     * @param string|null $title
     * @return Feedback
     */
    function success(string $text, ?string $title = null)
    {
        return $this->add($text, 'success', $title);
    }

    /**
     * Add a info feddback
     *
     * @param string $text
     * @param string|null $title
     * @return Feedback
     */
    function info(string $text, ?string $title = null)
    {
        return $this->add($text, 'info', $title);
    }

    /**
     * Add a danger feddback
     *
     * @param string $text
     * @param string|null $title
     * @return Feedback
     */
    function danger(string $text, ?string $title = null)
    {
        return $this->add($text, 'danger', $title);
    }

    /**
     * Add a error feddback
     *
     * @param string $text
     * @param string|null $title
     * @return Feedback
     */
    function error(string $text, ?string $title = null)
    {
        return $this->add($text, 'error', $title);
    }

    /**
     * Add a light feddback
     *
     * @param string $text
     * @param string|null $title
     * @return Feedback
     */
    function light(string $text, ?string $title = null)
    {
        return $this->add($text, 'light', $title);
    }

    /**
     * Add a default feddback
     *
     * @param string $text
     * @param string|null $title
     * @return Feedback
     */
    function default(string $text, ?string $title = null)
    {
        return $this->add($text, 'default', $title);
    }

    /**
     * Add a feedback
     *
     * @param string $text
     * @param string $type allows default, success, danger, error, info, light
     * @param string|null $title
     * @return Feedback
     */
    function add(string $text, string $type = 'default', ?string $title = null)
    {
        $this->text = $text;
        $this->type = $type;
        $this->title = $title;
        return $this;
    }

    /**
     * A flash feedback
     *
     * @return void
     */
    function flash()
    {
        $this->flash = true;

        session()->flash(self::$flashFeedbackKey, serialize($this));
    }

    /**
     * To array
     *
     * @return array
     */
    function toArray()
    {
        return [
            'flash' => $this->flash,
            'type' => $this->type,
            'title' => $this->title,
            'text' => $this->text,
            'actions' => $this->actions,
        ];
    }

    /**
     * Get a flash feedback
     *
     * @return Feedback|null
     */
    static function get()
    {
        return session()->has(self::$flashFeedbackKey) ? unserialize(session()->get(self::$flashFeedbackKey)) : null;
    }
}
