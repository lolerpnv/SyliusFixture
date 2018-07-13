<?php

namespace InchooBundle\Fixture;

use InchooBundle\Fixture\Generators\Books;
use InchooBundle\Fixture\Generators\Category;
use InchooBundle\Fixture\Generators\Mugs;
use Sylius\Bundle\FixturesBundle\Fixture\AbstractFixture;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Main fixture that handles taxon and product generation
 * Class InchooProductFixture
 * @package InchooBundle\Fixture
 */
class InchooProductFixture extends AbstractFixture
{
    /**
     * @var \Faker\Generator
     */
    private $faker;

    /**
     * @var OptionsResolver
     */
    private $optionsResolver;

    /**
     * @var Category
     */
    private $categoryFactory;

    /**
     * @var Books
     */
    private $booksFactory;

    /**
     * @var Mugs
     */
    private $mugsFactory;

    /**
     * InchooProductFixture constructor.
     * @param Category $categoryFactory
     * @param Books $booksFactory
     * @param Mugs $mugsFactory
     */
    public function __construct(
        Category $categoryFactory,
        Books $booksFactory,
        Mugs $mugsFactory
    ) {
        $this->categoryFactory = $categoryFactory;
        $this->booksFactory = $booksFactory;
        $this->mugsFactory = $mugsFactory;

        $this->faker = \Faker\Factory::create();
        $this->optionsResolver =
            (new OptionsResolver())
                ->setRequired('amount')
                ->setAllowedTypes('amount', 'int')
        ;
    }

    /**
     * @return string
     */
    function getName(): string
    {
        return "inchoo_product";
    }

    /**
     * Generating categories,attributes,products and product options
     * @param array $options
     */
    function load(array $options): void
    {
        //In case you want to use xdebug,rise nesting level
        //ini_set('xdebug.max_nesting_level', 1000);
        //create categories
        $this->categoryFactory->prepStructure();
        $this->booksFactory->generate($this->categoryFactory->catList);
        $this->mugsFactory->generate($this->categoryFactory->catList);

    }

    function configureOptionsNode(ArrayNodeDefinition $optionsNode): void
    {
        //do it , configure it
    }
}