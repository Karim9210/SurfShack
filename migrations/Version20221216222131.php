<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221216222131 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE surf_board ADD owner_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE surf_board ADD CONSTRAINT FK_217F593D7E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_217F593D7E3C61F9 ON surf_board (owner_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE surf_board DROP FOREIGN KEY FK_217F593D7E3C61F9');
        $this->addSql('DROP INDEX IDX_217F593D7E3C61F9 ON surf_board');
        $this->addSql('ALTER TABLE surf_board DROP owner_id');
    }
}
