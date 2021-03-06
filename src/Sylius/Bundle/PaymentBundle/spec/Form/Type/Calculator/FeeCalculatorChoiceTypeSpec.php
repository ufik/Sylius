<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Sylius\Bundle\PaymentBundle\Form\Type\Calculator;

use PhpSpec\ObjectBehavior;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Mateusz Zalewski <mateusz.zalewski@lakion.com>
 */
class FeeCalculatorChoiceTypeSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(array());
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Sylius\Bundle\PaymentBundle\Form\Type\Calculator\FeeCalculatorChoiceType');
    }

    function it_is_abstract_type_object()
    {
        $this->shouldHaveType(AbstractType::class);
    }

    function it_sets_default_options(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array('choices' => array()))->shouldBeCalled();

        $this->configureOptions($resolver);
    }

    function it_has_parent()
    {
        $this->getParent()->shouldReturn('choice');
    }

    function it_has_name()
    {
        $this->getName()->shouldReturn('sylius_fee_calculator_choice');
    }
}
