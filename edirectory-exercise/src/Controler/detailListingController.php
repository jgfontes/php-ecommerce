<?php


namespace Jfontes\EdirectoryExercise\Controler;


use Jfontes\EdirectoryExercise\Infrastructure\Helper\HtmlRenderer;
use Jfontes\EdirectoryExercise\Infrastructure\Repository\ListingRepository;

class detailListingController
{
    use HtmlRenderer;

    private ListingRepository $ListingRepository;

    public function __construct()
    {
        $this->ListingRepository = new ListingRepository();
    }

    public function ProcessRequisite()
    {
        $listingId = filter_input(
            INPUT_GET,
            'id',
            FILTER_SANITIZE_STRING
        );

        $listing = $this->ListingRepository->searchListingById($listingId);
        $html = $this->RenderHtml("detailListing.php", [
                'listing' => $listing
            ]
        );

        echo $html;
    }
}