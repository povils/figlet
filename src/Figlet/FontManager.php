<?php

/**
 * This is the part of Povils open-source library.
 *
 * @author Povilas Susinskas
 */

namespace Povils\Figlet;

/**
 * Class FontManager
 *
 * @package Povils\Figlet
 */
class FontManager
{
    /**
     * Defines default Figlet font when font is not set.
     */
    const DEFAULT_FONT = 'graceful';

    /**
     * Defines default Figlet font directory when fontDirectory is not set.
     */
    const DEFAULT_FONT_DIRECTORY = __DIR__ . DIRECTORY_SEPARATOR . 'fonts' . DIRECTORY_SEPARATOR;

    /**
     * Defines Figlet file format.
     */
    const FIGLET_FORMAT = 'flf';

    /**
     * The first five characters(signature) in the entire file must be "flf2a".
     */
    const VALID_FONT_SIGNATURE = 'flf2a';

    /**
     * @var Font
     */
    private $font;

    /**
     * @param string|null $fontName
     * @param string|null $fontDirectory
     *
     * @return Font
     * @throws \Exception
     */
    public function loadFont($fontName, $fontDirectory)
    {
        if ($this->needLoad($fontName)) {
            $font = $this->createFont($fontName, $fontDirectory);

            return $font;
        }

        return $this->currentFont();
    }

    /**
     * Return current loaded font.
     *
     * @return Font|null
     */
    private function currentFont()
    {
        return $this->font;
    }

    /**
     * @param string|null $fontName
     * @param string|null $fontDirectory
     *
     * @return Font
     * @throws \Exception
     */
    private function createFont($fontName, $fontDirectory)
    {
        if (null === $fontName) {
            $fontName = self::DEFAULT_FONT;
        }

        if (null === $fontDirectory) {
            $fontDirectory = self::DEFAULT_FONT_DIRECTORY;
        }

        $fileName = $this->getFileName($fontName, $fontDirectory);

        if (false === file_exists($fileName)) {
            throw new \Exception('Could not open ' . $fileName);
        }

        $font = new Font();

        $fileCollection = file($fileName);

        $font->setFileCollection($fileCollection);
        $font->setName($fontName);

        $font = $this->setFontParameters($font);

        $this->setCurrentFont($font);

        return $font;
    }

    /**
     * @param Font $font
     *
     * @return Font
     */
    private function setFontParameters($font)
    {
        $parameters = $this->extractHeadlineParameters($font->getFileCollection());

        $font
            ->setSignature($parameters['signature'])
            ->setHardBlank($parameters['hard_blank'])
            ->setHeight($parameters['height'])
            ->setMaxLength($parameters['max_length'])
            ->setOldLayout($parameters['old_layout'])
            ->setCommentLines($parameters['comment_lines'])
            ->setPrintDirection($parameters['print_direction'])
            ->setFullLayout($parameters['full_layout']);

        return $font;
    }

    /**
     * Extracts Figlet headline parameters.
     *
     * @param array $fileCollection
     *
     * @return array
     */
    private function extractHeadlineParameters($fileCollection)
    {
        $parameters = [];

        sscanf(
            $fileCollection[0],
            '%5s%c %d %*d %d %d %d %d %d',
            $parameters['signature'],
            $parameters['hard_blank'],
            $parameters['height'],
            $parameters['max_length'],
            $parameters['old_layout'],
            $parameters['comment_lines'],
            $parameters['print_direction'],
            $parameters['full_layout']
        );

        if ($parameters['signature'] !== self::VALID_FONT_SIGNATURE) {
            throw new \InvalidArgumentException('Invalid font file signature: ' . $parameters['signature']);
        }

        return $parameters;
    }

    /**
     * @param string $fontName
     *
     * @return bool
     */
    private function needLoad($fontName)
    {
        return null === $this->currentFont() || $fontName !== $this->currentFont()->getName();
    }

    /**
     * @param string $fontName
     * @param string $fontDirectory
     *
     * @return string
     */
    private function getFileName($fontName, $fontDirectory)
    {
        $fileName = $fontDirectory . $fontName . '.' . self::FIGLET_FORMAT;

        return $fileName;
    }

    /**
     * @param Font $font
     */
    private function setCurrentFont($font)
    {
        $this->font = $font;
    }
}
