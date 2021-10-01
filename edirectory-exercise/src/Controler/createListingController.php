<?php


namespace Jfontes\EdirectoryExercise\Controler;


use Jfontes\EdirectoryExercise\Entity\Listing;
use Jfontes\EdirectoryExercise\Infrastructure\Helper\flashMessage;
use Jfontes\EdirectoryExercise\Infrastructure\Helper\HtmlRenderer;
use Jfontes\EdirectoryExercise\Infrastructure\Repository\CategoriesRepository;
use Jfontes\EdirectoryExercise\Infrastructure\Repository\ListingRepository;

class createListingController
{
    use HtmlRenderer, flashMessage;

    private ListingRepository $ListingRepository;
    private CategoriesRepository $CategoryRepository;

    public function __construct()
    {
        $this->ListingRepository = new ListingRepository();
        $this->CategoryRepository = new CategoriesRepository();
    }

    public function ProcessRequisite()
    {
        $title = filter_input(
            INPUT_POST,
            'title',
            FILTER_SANITIZE_STRING
        );
        $address = filter_input(
            INPUT_POST,
            'address',
            FILTER_SANITIZE_STRING
        );
        $city = filter_input(
            INPUT_POST,
            'city',
            FILTER_SANITIZE_STRING
        );
        $state = filter_input(
            INPUT_POST,
            'state',
            FILTER_SANITIZE_STRING
        );
        $description = filter_input(
            INPUT_POST,
            'description',
            FILTER_SANITIZE_STRING
        );
        $category = filter_input(
            INPUT_POST,
            'category',
            FILTER_SANITIZE_STRING
        );

        //Validate if main inputs are empty ->
        if(empty($title) || empty($address) || empty($city) || empty($state) || empty($description))
        {
            $this->writeFlashMessage("Listing cannot be created when main inputs are empty", "danger");
            header('Location: /create-listing');
            exit();
        }

        //Add forms validations here

        $listing = new Listing($title, $address, $city, $state, $description, []);
        //When working with autentication, implement user_id as variable
        $results = $this->ListingRepository->addListing($_SESSION['user_id'], $listing);

        if ($results) {
            //Create new category
            $this->CategoryRepository->addCategory(
                $category,
                $this->ListingRepository->getLastInsertionId()
            );

            $this->writeFlashMessage("Listing successfully created", "success");
            header('Location: /search');
        }
        else
        {
            $this->writeFlashMessage("Error when creating listing", "danger");
            header('Location: /create-listing');
        }
    }
}