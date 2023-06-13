<?php

namespace App\Controller\Admin;

use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use Symfony\Component\Validator\Constraints\Date;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;

class UsersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Users::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Utilisateur')
            ->setEntityLabelInPlural('Utilisateurs')

            ->setPageTitle('index',' DtRecord Administration des utilisateurs');
            
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            TextField::new('FirstName')
            ->setFormTypeOption('disabled', 'disabled')
            ->setLabel('Prénom'),

            TextField::new('LastName')
            ->setFormTypeOption('disabled', 'disabled')
            ->setLabel('Nom'),
            TextField::new('Email')
                ->setFormTypeOption('disabled', 'disabled'),
            Arrayfield::new('Roles'),
            DateField::new('CreatedAt')
                ->setLabel('Date de création')
                ->setFormTypeOption('disabled', 'disabled')
                ->setFormat('dd-MM-yyyy')
                ->hideOnForm(),


        ];
    }
    
}
