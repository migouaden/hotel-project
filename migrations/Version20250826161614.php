<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250826161614 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE room (id INT AUTO_INCREMENT NOT NULL, user_created_id INT DEFAULT NULL, status_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, base_price DOUBLE PRECISION NOT NULL, max_guests DOUBLE PRECISION NOT NULL, bed_count DOUBLE PRECISION NOT NULL, size INT NOT NULL, created_at DATE NOT NULL, active INT NOT NULL, INDEX IDX_729F519BF987D8A8 (user_created_id), INDEX IDX_729F519B6BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE room_status (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE room ADD CONSTRAINT FK_729F519BF987D8A8 FOREIGN KEY (user_created_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE room ADD CONSTRAINT FK_729F519B6BF700BD FOREIGN KEY (status_id) REFERENCES room_status (id)');
        $this->addSql('DROP INDEX UNIQ_IDENTIFIER_EMAIL ON user');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE room DROP FOREIGN KEY FK_729F519BF987D8A8');
        $this->addSql('ALTER TABLE room DROP FOREIGN KEY FK_729F519B6BF700BD');
        $this->addSql('DROP TABLE room');
        $this->addSql('DROP TABLE room_status');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON user (email)');
    }
}
