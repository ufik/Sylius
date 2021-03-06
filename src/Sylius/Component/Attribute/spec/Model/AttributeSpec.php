<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Sylius\Component\Attribute\Model;

use PhpSpec\ObjectBehavior;
use Sylius\Component\Attribute\Model\AttributeInterface;
use Sylius\Component\Attribute\Model\AttributeTypes;

/**
 * @author Paweł Jędrzejewski <pawel@sylius.org>
 * @author Gonzalo Vilaseca <gvilaseca@reiss.co.uk>
 */
class AttributeSpec extends ObjectBehavior
{
    public function let()
    {
        $this->setCurrentLocale('en_US');
        $this->setFallbackLocale('en_US');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Sylius\Component\Attribute\Model\Attribute');
    }

    function it_implements_Sylius_attribute_interface()
    {
        $this->shouldImplement(AttributeInterface::class);
    }

    function it_has_no_id_by_default()
    {
        $this->getId()->shouldReturn(null);
    }

    function it_has_no_name_by_default()
    {
        $this->getName()->shouldReturn(null);
    }

    function its_name_is_mutable()
    {
        $this->setName('T-Shirt collection');
        $this->getName()->shouldReturn('T-Shirt collection');
    }

    function it_returns_name_when_converted_to_string()
    {
        $this->setName('T-Shirt material');
        $this->__toString()->shouldReturn('T-Shirt material');
    }

    function it_has_no_presentation_by_default()
    {
        $this->getPresentation()->shouldReturn(null);
    }

    function its_presentation_is_mutable()
    {
        $this->setPresentation('Size');
        $this->getPresentation()->shouldReturn('Size');
    }

    function it_has_text_type_by_default()
    {
        $this->getType()->shouldReturn(AttributeTypes::TEXT);
    }

    function its_type_is_mutable()
    {
        $this->setType(AttributeTypes::CHECKBOX);
        $this->getType()->shouldReturn(AttributeTypes::CHECKBOX);
    }

    function it_initializes_empty_configuration_array_by_default()
    {
        $this->getConfiguration()->shouldReturn(array());
    }

    function its_configuration_is_mutable()
    {
        $this->setConfiguration(array('choices' => array('Red', 'Blue')));
        $this->getConfiguration()->shouldReturn(array('choices' => array('Red', 'Blue')));
    }

    function it_initializes_creation_date_by_default()
    {
        $this->getCreatedAt()->shouldHaveType(\DateTime::class);
    }

    function its_creation_date_is_mutable(\DateTime $date)
    {
        $this->setCreatedAt($date);
        $this->getCreatedAt()->shouldReturn($date);
    }

    function it_has_no_last_update_date_by_default()
    {
        $this->getUpdatedAt()->shouldReturn(null);
    }

    function its_last_update_date_is_mutable(\DateTime $date)
    {
        $this->setUpdatedAt($date);
        $this->getUpdatedAt()->shouldReturn($date);
    }
}
