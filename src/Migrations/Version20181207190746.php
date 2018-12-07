<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181207190746 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE society (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, motto VARCHAR(255) DEFAULT NULL, email_public VARCHAR(255) DEFAULT NULL, email_form VARCHAR(255) DEFAULT NULL, phone_mobile VARCHAR(30) DEFAULT NULL, phone_fixe VARCHAR(30) DEFAULT NULL, facebook_link VARCHAR(255) DEFAULT NULL, twitter_link VARCHAR(255) DEFAULT NULL, youtube_link VARCHAR(255) DEFAULT NULL, instagram_link VARCHAR(255) DEFAULT NULL, github_link VARCHAR(255) DEFAULT NULL, linkedin_link VARCHAR(255) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, zipcode INT DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE society');
    }
}
