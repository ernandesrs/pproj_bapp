<?php

namespace App\Services;

abstract class Service
{
    /**
     * Rules
     *
     * @param boolean $updating
     * @return array
     */
    abstract static function rules(?int $id = null): array;

    /**
     * Messages
     *
     * @return array
     */
    abstract static function messages(): array;
}
