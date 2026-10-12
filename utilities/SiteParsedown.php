<?php
    require_once __DIR__.'/parsedown/Parsedown.php';

    // Parsedown with site-specific extensions:
    // - A paragraph made up only of images, one per line, with at least two images,
    //   is rendered as a <photo-gallery> instead of a <p>.
    //   To opt out, put the images on the same line.
    class SiteParsedown extends Parsedown
    {
        const IMAGE_LINE = '/^\s*!\[[^\]]*\]\([^)]*\)\s*$/';

        protected function element(array $Element)
        {
            if ($Element['name'] === 'p' && isset($Element['text']) && is_string($Element['text']) && $this->isGallery($Element['text']))
            {
                $Element['name'] = 'photo-gallery';
            }

            return parent::element($Element);
        }

        private function isGallery(string $text)
        {
            $lines = array_filter(explode("\n", $text), 'trim');

            if (count($lines) < 2)
            {
                return false;
            }

            foreach ($lines as $line)
            {
                if ( ! preg_match(self::IMAGE_LINE, $line))
                {
                    return false;
                }
            }

            return true;
        }
    }

?>
