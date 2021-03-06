<?php

namespace Ilcfrance\Orangetools\SecurityBundle\Form;

use Gregwar\CaptchaBundle\Type\CaptchaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

/**
 * Form Class used to initialize password recovery process
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class LostPasswordTForm extends AbstractType
{

	/**
	 * Form builder
	 *
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm(FormBuilderInterface $builder, array $options)
	{

		$builder->add(
			'username',
			TextType::class,
			array(
				'label' => 'ilcfrance.orangetools.security.LostPasswordForm.username.label',
				'constraints' => array(
					new NotBlank(),
					new Length(array(
						'min' => 3,
						'max' => 50
					))
				)
			));

		$builder->add(
			'captcha',
			CaptchaType::class,
			array(
				'label' => 'ilcfrance.orangetools.security.LostPasswordForm.captcha.label',
				'expiration' => 5,
				'height' => '34',
				'reload' => true,
				'as_url' => true,
				'humanity' => 1
			));

	}

	/**
	 *
	 * {@inheritDoc} @see FormTypeInterface::getName()
	 * @return string
	 */
	public function getName()
	{

		return 'LostPasswordForm';

	}

	/**
	 *
	 * {@inheritDoc} @see AbstractType::getBlockPrefix()
	 */
	public function getBlockPrefix()
	{

		return $this->getName();

	}

	/**
	 * get the default options
	 *
	 * @return multitype:string multitype:string
	 */
	public function getDefaultOptions()
	{

		return array(
			'validation_groups' => array(
				'Default'
			)
		);

	}

	/**
	 *
	 * {@inheritDoc} @see AbstractType::configureOptions()
	 */
	public function configureOptions(OptionsResolver $resolver)
	{

		$resolver->setDefaults($this->getDefaultOptions());

	}

}
