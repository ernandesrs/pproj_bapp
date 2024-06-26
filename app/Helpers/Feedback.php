<?php

namespace App\Helpers;

class Feedback
{
    static string $flashFeedbackKey = 'app_flash_feedback';

    public int $timer = 3000;

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
     * Add a feedback action
     *
     * @param string $label
     * @param string $href
     * @param bool $external
     * @return Feedback
     */
    function addAction(string $label, string $href, bool $external = false)
    {
        $this->actions[] = [
            'label' => $label,
            'href' => $href,
            'external' => $external
        ];
        return $this;
    }

    /**
     * Feedback timer to close
     *
     * @param integer $timer
     * @return Feedback
     */
    function timer(int $timer = 3000)
    {
        $this->timer = $timer;
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
     * Dispatch a event with alert data
     *
     * @param \Livewire\Component $component
     * @return void
     */
    function dispatch(\Livewire\Component $component)
    {
        $component->dispatch('server_from_feedback', $this->toArray());
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
            'timer' => $this->timer,
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
