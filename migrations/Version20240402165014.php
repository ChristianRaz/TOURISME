<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240402165014 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE app_user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_88BDF3E9F85E0677 (username), UNIQUE INDEX UNIQ_88BDF3E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, promo_id INT DEFAULT NULL, media_id INT DEFAULT NULL, pix DOUBLE PRECISION DEFAULT NULL, shortdesc VARCHAR(255) NOT NULL, descrip MEDIUMTEXT NOT NULL, dest VARCHAR(255) NOT NULL, datedep DATE DEFAULT NULL, datearriv DATE DEFAULT NULL, datecreat DATE DEFAULT NULL, datemodif DATE DEFAULT NULL, titre VARCHAR(255) NOT NULL, top_distination TINYINT(1) DEFAULT NULL, INDEX IDX_23A0E66D0C07AFF (promo_id), UNIQUE INDEX UNIQ_23A0E66EA9FDD75 (media_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE circuit (id INT AUTO_INCREMENT NOT NULL, prix_incluant VARCHAR(255) NOT NULL, prix_nincus_pas VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE detailoffre (id INT AUTO_INCREMENT NOT NULL, destination VARCHAR(255) NOT NULL, ltineaire VARCHAR(255) NOT NULL, horaire VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hotel (id INT AUTO_INCREMENT NOT NULL, sejour_id INT DEFAULT NULL, aticle_id INT DEFAULT NULL, etoile INT NOT NULL, adresse VARCHAR(255) NOT NULL, top_hotel TINYINT(1) DEFAULT NULL, INDEX IDX_3535ED984CF0CF (sejour_id), UNIQUE INDEX UNIQ_3535ED9DC7FEBBE (aticle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images (id INT AUTO_INCREMENT NOT NULL, article_id INT DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, alt VARCHAR(255) DEFAULT NULL, INDEX IDX_E01FBE6A7294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jour (id INT AUTO_INCREMENT NOT NULL, voyage_id INT DEFAULT NULL, details_id INT DEFAULT NULL, titre VARCHAR(255) DEFAULT NULL, description VARCHAR(700) DEFAULT NULL, INDEX IDX_DA17D9C568C9E5AF (voyage_id), UNIQUE INDEX UNIQ_DA17D9C5BB1A0722 (details_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, updated_at DATETIME NOT NULL, image_name VARCHAR(255) DEFAULT NULL, image_original_name VARCHAR(255) DEFAULT NULL, image_mime_type VARCHAR(255) DEFAULT NULL, image_size INT DEFAULT NULL, image_dimensions LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:simple_array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE omra (id INT AUTO_INCREMENT NOT NULL, article_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_25B22A807294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promos (id INT AUTO_INCREMENT NOT NULL, promo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, article_id INT DEFAULT NULL, email VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, is_ok TINYINT(1) DEFAULT 0, INDEX IDX_42C849557294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rtill (id INT AUTO_INCREMENT NOT NULL, jjh VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sejour (id INT AUTO_INCREMENT NOT NULL, paye VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transfert (id INT AUTO_INCREMENT NOT NULL, duree VARCHAR(255) NOT NULL, kilometre VARCHAR(255) NOT NULL, prixcomprend VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ville (id INT AUTO_INCREMENT NOT NULL, sejour_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_43C3D9C384CF0CF (sejour_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vol (id INT AUTO_INCREMENT NOT NULL, article_id INT DEFAULT NULL, class VARCHAR(255) NOT NULL, adulte INT NOT NULL, jeune INT NOT NULL, type_vol VARCHAR(255) DEFAULT NULL, depart VARCHAR(255) NOT NULL, time VARCHAR(255) NOT NULL, time_darriver VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_95C97EB7294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voyage (id INT AUTO_INCREMENT NOT NULL, article_id INT DEFAULT NULL, sejour_id INT DEFAULT NULL, circuit_id INT DEFAULT NULL, transfert_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_3F9D89557294869C (article_id), INDEX IDX_3F9D895584CF0CF (sejour_id), UNIQUE INDEX UNIQ_3F9D8955CF2182C8 (circuit_id), UNIQUE INDEX UNIQ_3F9D89553C9C4BAD (transfert_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66D0C07AFF FOREIGN KEY (promo_id) REFERENCES promos (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE hotel ADD CONSTRAINT FK_3535ED984CF0CF FOREIGN KEY (sejour_id) REFERENCES sejour (id)');
        $this->addSql('ALTER TABLE hotel ADD CONSTRAINT FK_3535ED9DC7FEBBE FOREIGN KEY (aticle_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6A7294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE jour ADD CONSTRAINT FK_DA17D9C568C9E5AF FOREIGN KEY (voyage_id) REFERENCES voyage (id)');
        $this->addSql('ALTER TABLE jour ADD CONSTRAINT FK_DA17D9C5BB1A0722 FOREIGN KEY (details_id) REFERENCES detailoffre (id)');
        $this->addSql('ALTER TABLE omra ADD CONSTRAINT FK_25B22A807294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849557294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE ville ADD CONSTRAINT FK_43C3D9C384CF0CF FOREIGN KEY (sejour_id) REFERENCES sejour (id)');
        $this->addSql('ALTER TABLE vol ADD CONSTRAINT FK_95C97EB7294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE voyage ADD CONSTRAINT FK_3F9D89557294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE voyage ADD CONSTRAINT FK_3F9D895584CF0CF FOREIGN KEY (sejour_id) REFERENCES sejour (id)');
        $this->addSql('ALTER TABLE voyage ADD CONSTRAINT FK_3F9D8955CF2182C8 FOREIGN KEY (circuit_id) REFERENCES circuit (id)');
        $this->addSql('ALTER TABLE voyage ADD CONSTRAINT FK_3F9D89553C9C4BAD FOREIGN KEY (transfert_id) REFERENCES transfert (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66D0C07AFF');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66EA9FDD75');
        $this->addSql('ALTER TABLE hotel DROP FOREIGN KEY FK_3535ED984CF0CF');
        $this->addSql('ALTER TABLE hotel DROP FOREIGN KEY FK_3535ED9DC7FEBBE');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6A7294869C');
        $this->addSql('ALTER TABLE jour DROP FOREIGN KEY FK_DA17D9C568C9E5AF');
        $this->addSql('ALTER TABLE jour DROP FOREIGN KEY FK_DA17D9C5BB1A0722');
        $this->addSql('ALTER TABLE omra DROP FOREIGN KEY FK_25B22A807294869C');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849557294869C');
        $this->addSql('ALTER TABLE ville DROP FOREIGN KEY FK_43C3D9C384CF0CF');
        $this->addSql('ALTER TABLE vol DROP FOREIGN KEY FK_95C97EB7294869C');
        $this->addSql('ALTER TABLE voyage DROP FOREIGN KEY FK_3F9D89557294869C');
        $this->addSql('ALTER TABLE voyage DROP FOREIGN KEY FK_3F9D895584CF0CF');
        $this->addSql('ALTER TABLE voyage DROP FOREIGN KEY FK_3F9D8955CF2182C8');
        $this->addSql('ALTER TABLE voyage DROP FOREIGN KEY FK_3F9D89553C9C4BAD');
        $this->addSql('DROP TABLE app_user');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE circuit');
        $this->addSql('DROP TABLE detailoffre');
        $this->addSql('DROP TABLE hotel');
        $this->addSql('DROP TABLE images');
        $this->addSql('DROP TABLE jour');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE omra');
        $this->addSql('DROP TABLE promos');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE rtill');
        $this->addSql('DROP TABLE sejour');
        $this->addSql('DROP TABLE transfert');
        $this->addSql('DROP TABLE ville');
        $this->addSql('DROP TABLE vol');
        $this->addSql('DROP TABLE voyage');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
