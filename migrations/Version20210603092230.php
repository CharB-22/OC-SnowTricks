<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210603092230 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment ADD comment_date DATETIME NOT NULL, CHANGE comment_content comment_content LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE trick_image DROP FOREIGN KEY FK_E1204E0B281BE2E');
        $this->addSql('DROP INDEX IDX_E1204E0B281BE2E ON trick_image');
        $this->addSql('ALTER TABLE trick_image ADD trick_id INT DEFAULT NULL, DROP trick_id');
        $this->addSql('ALTER TABLE trick_image ADD CONSTRAINT FK_E1204E03256915B FOREIGN KEY (trick_id) REFERENCES trick (id)');
        $this->addSql('CREATE INDEX IDX_E1204E03256915B ON trick_image (trick_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP comment_date, CHANGE comment_content comment_content LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE trick_image DROP FOREIGN KEY FK_E1204E03256915B');
        $this->addSql('DROP INDEX IDX_E1204E03256915B ON trick_image');
        $this->addSql('ALTER TABLE trick_image ADD trick_id INT NOT NULL, DROP trick_id');
        $this->addSql('ALTER TABLE trick_image ADD CONSTRAINT FK_E1204E0B281BE2E FOREIGN KEY (trick_id) REFERENCES trick (id)');
        $this->addSql('CREATE INDEX IDX_E1204E0B281BE2E ON trick_image (trick_id)');
    }
}
