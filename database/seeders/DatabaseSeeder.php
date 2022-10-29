<?php

namespace Database\Seeders;

use App\Models\Carousel;
use App\Models\ProductTourDate;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            FaqSeeder::class,
            AirportSeeder::class,
            UserSeeder::class,
            UserFlightBookGroupSeeder::class,
            UserFlightBookSeeder::class,
            ProductsConfigSeeder::class,
            UserSingleFlightBookSeeder::class,
            AboutUsSeeder::class,
            PrivacyPolicySeeder::class,
            VisiMisiSeeder::class,
            LogresImageSeeder::class,
            CountrySeeder::class,
            VisaDocumentSeeder::class,
            AdvertisementSeeder::class,
            BankSeeder::class,
            EventSeeder::class,
            SupplierSeeder::class,
            ProductTourSeeder::class,
            ProductTourHighlightSeeder::class,
            ProductTourItinenarySeeder::class,
            ProductTourPhotoSeeder::class,
            ProductTourIncludeSeeder::class,
            ProductTourExcludeSeeder::class,
            ProductTourThermcondSeeder::class,
            ProductTourCancelpolicySeeder::class,
            ProductTourCountrytagSeeder::class,
            ProductTourFeedbackSeeder::class,
            ProductTourDateSeeder::class,
            TagProductSeeder::class,
            DisplayBannerSeeder::class,
            CarouselSeeder::class,
            PromoSeeder::class,
            JokulPaymentConfigSeeder::class
        ]);
    }
}
