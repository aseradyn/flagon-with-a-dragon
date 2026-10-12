<?php
    require_once __DIR__.'/parsedown/Parsedown.php';

    // Parsedown with site-specific extensions:
    // - A paragraph made up only of images, one per line, with at least two images,
    //   is rendered as a <photo-gallery> instead of a <p>.
    //   To opt out, put the images on the same line.
    class SiteParsedown extends Parsedown
    {
        // a single rendered <img> tag; Parsedown escapes any > inside attribute values
        const IMAGE_TAG = '/^<img [^>]*\/>$/';

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
            if (strpos($text, '![') === false)
            {
                return false;
            }

            $lines = array_filter(array_map('trim', explode("\n", $text)));

            if (count($lines) < 2)
            {
                return false;
            }

            // let Parsedown decide what counts as an image, so tricky URLs
            // like file_(WebShare).jpg are handled the same way it renders them
            foreach ($lines as $line)
            {
                if ( ! preg_match(self::IMAGE_TAG, $this->line($line)))
                {
                    return false;
                }
            }

            return true;
        }
    }

?>
