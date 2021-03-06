<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181103153214 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE commander_fournitures (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, nbr_commande INT NOT NULL, institut VARCHAR(255) NOT NULL, niveau VARCHAR(255) NOT NULL, livres TINYINT(1) DEFAULT NULL, cahiers TINYINT(1) DEFAULT NULL, fournitures TINYINT(1) DEFAULT NULL, confirmation_condition TINYINT(1) NOT NULL, recevoir_offres TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, subject VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE demande_devis (id INT AUTO_INCREMENT NOT NULL, nom_societe VARCHAR(255) NOT NULL, telephone NUMERIC(10, 0) NOT NULL, email VARCHAR(255) NOT NULL, fichier VARCHAR(255) NOT NULL, condition_utilisation TINYINT(1) NOT NULL, recevoir_offr_email TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE commander_fournitures');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE demande_devis');
    }
}
