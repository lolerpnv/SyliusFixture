##Setup

- Add bundle in /app/AppKernel.php bundles array

"new \InchooBundle\InchooBundle(),"

- Add config in /app/config.yml 

"- { resource: "@InchooBundle/Resources/config/app/config.yml" }"

- Run "php bin/console cache:clear" in project root

- Run "php bin/console sylius:fixture:load inchoo" to run inchoo suite


###Notes

 - In case of running fixtures several times,manually clear /web/{env}/media/image/*
   Sylius doesn't clean that folder for some reason.
   
 - Keep in mind that generation is slow af due to us using doctrine,
    don't use doctrine for generations,imports or exports