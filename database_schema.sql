CREATE DATABASE IF NOT EXISTS `tracker_db` DEFAULT CHARACTER
SET
    utf16 COLLATE utf16_general_ci;

USE `tracker_db`;

-- Table structure for table `visitors_records`
CREATE TABLE
    `visitors_records` (
        `id` int NOT NULL,
        `site_url` varchar(255) NOT NULL,
        `user_agent` text NOT NULL,
        `ip_address` varchar(100) NOT NULL,
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
    ) ENGINE = InnoDB DEFAULT CHARSET = utf16;

-- Indexes for table `visitors_records`
ALTER TABLE `visitors_records` ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT for table `visitors_records`
ALTER TABLE `visitors_records` MODIFY `id` int NOT NULL AUTO_INCREMENT;