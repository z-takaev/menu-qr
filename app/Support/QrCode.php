<?php

namespace App\Support;

use BaconQrCode\Writer;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;

class QrCode
{
    private int $size = 400;

    public function __construct(public string $content)
    {
    }

    public function size(int $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function svg(): string
    {
        $renderer = new ImageRenderer(
            new RendererStyle($this->size),
            new SvgImageBackEnd()
        );

        $writer = new Writer($renderer);

        return $writer->writeString($this->content);
    }
}
