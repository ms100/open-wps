<?php

namespace Ms100\OpenWps\Entities;

/**
 * Class WaterMark 水印
 *
 * @package Ms100\OpenWps\Entities
 */
class Watermark implements \JsonSerializable
{

    protected $type = 0; //水印类型， 0为无水印； 1为文字水印
    protected $value = ''; //文字水印的文字，当type为1时此字段必选
    protected $fillstyle = ''; //'rgba( 192, 192, 192, 0.6 )' 水印的透明度，非必选，有默认值
    protected $font = '';    //'bold 20px Serif' 水印的字体，非必选，有默认值
    protected $rotate = 0; //-0.7853982, 水印的旋转度，非必选，有默认值
    protected $horizontal = 0; //50，水印水平间距，非必选，有默认值
    protected $vertical = 0; //100，水印垂直间距，非必选，有默认值

    public function __construct(
        bool $is_open = false,
        string $value = '',
        string $fillstyle = '',
        string $font = '',
        int $rotate = 0,
        int $horizontal = 0,
        int $vertical = 0
    ) {
        $this->type = (int)$is_open;
        $this->value = $value;
        $this->fillstyle = $fillstyle;
        $this->font = $font;
        $this->rotate = $rotate;
        $this->horizontal = $horizontal;
        $this->vertical = $vertical;
    }

    /**
     * @param bool $bool
     */
    public function open(bool $bool)
    {
        $this->type = (int)$bool;
    }

    /**
     * @return bool
     */
    public function isOpen(): bool
    {
        return (bool)$this->type;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getFillstyle(): string
    {
        return $this->fillstyle;
    }

    /**
     * @param string $fillstyle
     */
    public function setFillstyle(string $fillstyle)
    {
        $this->fillstyle = $fillstyle;
    }

    /**
     * @return string
     */
    public function getFont(): string
    {
        return $this->font;
    }

    /**
     * @param string $font
     */
    public function setFont(string $font)
    {
        $this->font = $font;
    }

    /**
     * @return int
     */
    public function getRotate(): int
    {
        return $this->rotate;
    }

    /**
     * @param int $rotate
     */
    public function setRotate(int $rotate)
    {
        $this->rotate = $rotate;
    }

    /**
     * @return int
     */
    public function getHorizontal(): int
    {
        return $this->horizontal;
    }

    /**
     * @param int $horizontal
     */
    public function setHorizontal(int $horizontal)
    {
        $this->horizontal = $horizontal;
    }

    /**
     * @return int
     */
    public function getVertical(): int
    {
        return $this->vertical;
    }

    /**
     * @param int $vertical
     */
    public function setVertical(int $vertical)
    {
        $this->vertical = $vertical;
    }

    public function jsonSerialize()
    {
        $json['type'] = $this->type;
        if ($this->type) {
            empty($this->value) || $json['value'] = $this->value;
            empty($this->fillstyle) || $json['fillstyle'] = $this->fillstyle;
            empty($this->font) || $json['font'] = $this->font;
            empty($this->rotate) || $json['rotate'] = $this->rotate;
            empty($this->horizontal) || $json['horizontal'] = $this->horizontal;
            empty($this->vertical) || $json['vertical'] = $this->vertical;
        }

        return $json;
    }
}