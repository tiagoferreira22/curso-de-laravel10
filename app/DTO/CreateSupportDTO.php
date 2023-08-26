<?php

namespace App\DTO;

use App\Http\Requests\StoreUpdateSupport;

class CreateSupportDTO
{
    public function __construct(
        public string $subject,
        public string $status,
        public string $content
    ) {
    }

    public function makeFromRequest(StoreUpdateSupport $request)
    {
        return new self(
            $request->subject,
            'a',
            $request->content,
        );
    }
}
