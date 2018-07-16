<?php

namespace InchooBundle\Fixture;

use InchooBundle\Fixture\Generators\Books;
use InchooBundle\Fixture\Generators\Category;
use InchooBundle\Fixture\Generators\Mugs;
use Sylius\Bundle\CoreBundle\Fixture\AbstractResourceFixture;
use Sylius\Bundle\FixturesBundle\Fixture\AbstractFixture;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @package InchooBundle\Fixture
 */
class InchooProductFixture extends AbstractFixture
{
    /**
     * @var AbstractResourceFixture
     */
    private $productAttributeFixture;

    /**
     * @var AbstractResourceFixture
     */
    private $productFixture;

    /**
     * @var string
     */
    private $baseLocaleCode;

    public  function __construct(
        AbstractResourceFixture $productAttributeFixture,
        AbstractResourceFixture $productFixture,
        string $baseLocaleCode
    )
    {
        $this->productAttributeFixture = $productAttributeFixture;
        $this->productFixture = $productFixture;
        $this->baseLocaleCode = $baseLocaleCode;
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
        echo "ss";
        //fixture logic
    }

    /**
     * this method allows us to declare options which fixture will expect upon execution
     *
     * @param ArrayNodeDefinition $optionsNode
     */
    function configureOptionsNode(ArrayNodeDefinition $optionsNode): void
    {
        //optionsNode allows you to define parameters for fixture
        $optionsNode
            ->children()
            ->integerNode('amount')->isRequired()->min(0)->end()
        ;
    }
}