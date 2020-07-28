<?php

namespace Ms100\OpenWps\PageAttributes;

class CommandBar implements \JsonSerializable
{
    const CMD_ID_HEADERLEFT = 'HeaderLeft';
    const CMD_ID_HEADERRIGHT = 'HeaderRight';
    const CMD_ID_FLOATQUICKHELP = 'FloatQuickHelp';
    const CMD_ID_CONTEXTMENUCONVENE = 'ContextMenuConvene';
    const CMD_ID_REVIEWTRACKCHANGES = 'ReviewTrackChanges';
    const CMD_ID_TRACKCHANGES = 'TrackChanges';
    const CMD_ID_WPPMOBILEMARKBUTTON = 'WPPMobileMarkButton';
    const CMD_IDS = [
        self::CMD_ID_HEADERLEFT,
        self::CMD_ID_HEADERRIGHT,
        self::CMD_ID_FLOATQUICKHELP,
        self::CMD_ID_CONTEXTMENUCONVENE,
        self::CMD_ID_REVIEWTRACKCHANGES,
        self::CMD_ID_TRACKCHANGES,
        self::CMD_ID_WPPMOBILEMARKBUTTON,
    ];
    protected $cmb_id = '';
    protected $visible = false;
    protected $enable = false;

    /**
     * CommandBar constructor.
     *
     * @param string $cmb_id
     * @param bool $visible
     * @param bool $enable
     */
    public function __construct(string $cmb_id, bool $visible, bool $enable)
    {
        $this->cmb_id = $cmb_id;
        $this->visible = $visible;
        $this->enable = $enable;
    }

    /**
     * @param string $cmb_id
     */
    public function setCmbId(string $cmb_id)
    {
        $this->cmb_id = $cmb_id;
    }

    /**
     * @param bool $visible
     */
    public function setVisible(bool $visible)
    {
        $this->visible = $visible;
    }

    /**
     * @param bool $enable
     */
    public function setEnable(bool $enable)
    {
        $this->enable = $enable;
    }


    public function jsonSerialize()
    {
        return [
            'cmbId' => $this->cmb_id,
            'attributes' => [
                'visible' => $this->visible,
                'enable' => $this->enable,
            ],
        ];
    }
}

