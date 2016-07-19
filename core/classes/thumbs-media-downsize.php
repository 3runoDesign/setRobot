<?php
// TODO: Improve comments.
class MediaDownsize
{
    private $additionalImageSizes;

    private $allSizes;
    private $imageResize;
    private $attUrl;

    private $imageData;

    private $thumbId;
    private $imageOut;
    private $imageSize;

    public function __construct()
    {
        add_filter('image_downsize', array($this, 'thumbDownsizer'), 10, 3);
    }

    private function getAllImageSizesWP()
    {
        $thumbsAllImageSizes = array();
        $interimSizes = get_intermediate_image_sizes();

        foreach ($interimSizes as $sizeName) {
            if (in_array($sizeName, array( 'thumbnail', 'medium', 'large' ))) {
                $thumbsAllImageSizes[ $sizeName ]['width'] = get_option($sizeName . '_size_w');
                $thumbsAllImageSizes[ $sizeName ]['height'] = get_option($sizeName . '_size_h');
                $thumbsAllImageSizes[ $sizeName ]['crop'] = (bool) get_option($sizeName . '_crop');
            } elseif (isset($this->additionalImageSizes[ $sizeName ])) {
                $thumbsAllImageSizes[ $sizeName ] = $this->additionalImageSizes[ $sizeName ];
            }
        }

        $this->allSizes = $thumbsAllImageSizes;
    }

    private function isSameSize()
    {
        if ($this->allSizes[ $this->imageSize ]['width'] == $this->imageData['sizes'][ $this->imageSize ]['width']
        && $this->allSizes[ $this->imageSize ]['height'] == $this->imageData['sizes'][ $this->imageSize ]['height']) {
            return false;
        }

        if (! empty($this->imageData['sizes'][ $this->imageSize ][ 'width_query' ])
        && ! empty($this->imageData['sizes'][ $this->imageSize ]['height_query'])) {
            if ($this->imageData['sizes'][ $this->imageSize ]['width_query'] == $this->allSizes[ $this->imageSize ]['width']
            && $this->imageData['sizes'][ $this->imageSize ]['height_query'] == $this->allSizes[ $this->imageSize ]['height']) {
                return false;
            }
        }
    }

    private function getImageSizeName()
    {
        if (empty($this->allSizes[ $this->imageSize ])) {
            return false;
        }

        if (! empty($this->imageData['sizes'][ $this->imageSize ]) && ! empty($this->allSizes[ $this->imageSize ])) {
            $this->isSameSize();
        }

        $this->imageResize = image_make_intermediate_size(
            get_attached_file($this->thumbId),
            $this->allSizes[ $this->imageSize ]['width'],
            $this->allSizes[ $this->imageSize ]['height'],
            $this->allSizes[ $this->imageSize ]['crop']
        );

        if (! $this->imageResize) {
            return false;
        }

        $this->imageData['sizes'][ $this->imageSize ] = $this->imageResize;
        $this->imageData['sizes'][ $this->imageSize ]['width_query'] = $this->allSizes[ $this->imageSize ]['width'];
        $this->imageData['sizes'][ $this->imageSize ]['height_query'] = $this->allSizes[ $this->imageSize ]['height'];

        wp_update_attachment_metadata($this->thumbId, $this->imageData);

        $this->attUrl = wp_get_attachment_url($this->thumbId);

        return array( dirname($this->attUrl) . '/' . $this->imageResize['file'], $this->imageResize['width'], $this->imageResize['height'], true );
    }

    public function thumbDownsizer($out, $thumbId, $size)
    {
        global $_wp_additional_image_sizes;
        $this->additionalImageSizes = $_wp_additional_image_sizes;

        $this->thumbId   = $thumbId;
        $this->imageOut  = $out;
        $this->imageSize = $size;
        $this->getAllImageSizesWP();
        $this->imageData = wp_get_attachment_metadata($this->thumbId);

        if (! is_array($this->imageData)) {
            return false;
        }

        if (is_string($this->imageSize)) {
            $this->getImageSizeName();
        } elseif (is_array($this->imageSize)) {
            $imagePath = get_attached_file($this->thumbId);

            $imageExt = pathinfo($imagePath, PATHINFO_EXTENSION);
            $imagePath = preg_replace('/^(.*)\.' . $imageExt . '$/', sprintf('$1-%sx%s.%s', $this->imageSize[0], $this->imageSize[1], $imageExt), $imagePath);

            $this->attUrl = wp_get_attachment_url($this->thumbId);

            if (file_exists($imagePath)) {
                return array( dirname($this->attUrl) . '/' . basename($imagePath), $this->imageSize[0], $this->imageSize[1], true );
            }

            $this->imageResize = image_make_intermediate_size(
                get_attached_file($this->thumbId),
                $this->imageSize[0],
                $this->imageSize[1],
                true
            );

            $this->imageData = wp_get_attachment_metadata($this->thumbId);

            $this->imageData['sizes'][ $this->imageSize[0] . 'x' . $this->imageSize[1] ] = $this->imageResize;
            wp_update_attachment_metadata($this->thumbId, $this->imageData);

            if (! $this->imageResize) {
                return false;
            }

            return array( dirname($this->attUrl) . '/' . $this->imageResize['file'], $this->imageResize['width'], $this->imageResize['height'], true );
        }

        return false;
    }
}

// TODO: Improve Self Instantiating
new MediaDownsize();
