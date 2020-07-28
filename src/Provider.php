<?php

namespace Ms100\OpenWps;

use Ms100\OpenWps\Entities\File;

class Provider
{
    /**
     * 在线编辑格式：表格文件
     */
    const FILE_TYPE_EXCEL = 's';

    /**
     * 在线编辑格式：文字文件
     */
    const FILE_TYPE_WORD = 'w';

    /**
     * 在线编辑格式：演示文件
     */
    const FILE_TYPE_PPT = 'p';

    /**
     * 在线编辑格式：PDF文件
     */
    const FILE_TYPE_PDF = 'f';

    /**
     * 文件类型格式映射
     *
     * @var array
     */
    const FILE_EXT_TYPE_MAP = [
        'xls' => self::FILE_TYPE_EXCEL,
        'xlt' => self::FILE_TYPE_EXCEL,
        'et' => self::FILE_TYPE_EXCEL,
        'xlsx' => self::FILE_TYPE_EXCEL,
        'xltx' => self::FILE_TYPE_EXCEL,
        'xlsm' => self::FILE_TYPE_EXCEL,
        'xltm' => self::FILE_TYPE_EXCEL,
        'doc' => self::FILE_TYPE_WORD,
        'dot' => self::FILE_TYPE_WORD,
        'wps' => self::FILE_TYPE_WORD,
        'wpt' => self::FILE_TYPE_WORD,
        'docx' => self::FILE_TYPE_WORD,
        'dotx' => self::FILE_TYPE_WORD,
        'docm' => self::FILE_TYPE_WORD,
        'dotm' => self::FILE_TYPE_WORD,
        'ppt' => self::FILE_TYPE_PPT,
        'pptx' => self::FILE_TYPE_PPT,
        'pptm' => self::FILE_TYPE_PPT,
        'ppsx' => self::FILE_TYPE_PPT,
        'ppsm' => self::FILE_TYPE_PPT,
        'potx' => self::FILE_TYPE_PPT,
        'potm' => self::FILE_TYPE_PPT,
        'dpt' => self::FILE_TYPE_PPT,
        'dps' => self::FILE_TYPE_PPT,
        'pdf' => self::FILE_TYPE_PDF,
    ];

    public static function checkSignature(array $param, string $app_secret)
    {
        if (empty($param['_w_signature']) || empty($param['_w_appid'])) {
            throw new WpsException('签名无效', 1);
        }

        $signature = Provider::makeSignature($_GET, $app_secret);

        if ($signature !== $param['_w_signature']) {
            throw new WpsException('签名无效', 1);
        }

        return true;
    }

    public static function makeSignature(array $params, string $app_secret)
    {
        foreach ($params as $k => $v) {
            if (strncmp('_w_', $k, 3) === 0 && $k !== '_w_signature') {
                $tmp[$k] = $k . '=' . $v;
            }
        }
        ksort($tmp, SORT_STRING);
        $tmp[] = '_w_secretkey=' . $app_secret;

        $signature = base64_encode(
            hash_hmac(
                'sha1',
                implode('', $tmp),
                $app_secret,
                true
            )
        );

        return $signature;
    }

    public static function isSupport($extension)
    {
        return isset(self::FILE_EXT_TYPE_MAP[strtolower($extension)]);
    }

    public static function makeWpsUrl(
        Config $config,
        File $file,
        array $query_params
    ) {
        $ext = pathinfo($file->getName(), PATHINFO_EXTENSION);

        $type = self::FILE_EXT_TYPE_MAP[$ext] ?? '';
        if (empty($type)) {
            throw new WpsException('文件格式不支持', 1);
        }

        if ($config->isNeedToken()) {
            $query_params['_w_tokentype'] = '1';
        }

        $query_params['_w_appid'] = $config->getAppId();
        $query_params['_w_signature'] = self::makeSignature(
            $query_params,
            $config->getAppSecret()
        );

        return sprintf(
            'https://wwo.wps.cn/office/%s/%s?%s',
            $type,
            $file->getId(),
            http_build_query($query_params)
        );
    }
}