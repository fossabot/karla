<?php
/**
 * Karla ImageMagick wrapper library
 *
 * PHP Version 5.3<
 *
 * @category Utility
 * @author   Johannes Skov Frandsen <localgod@heaven.dk>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT
 * @link     https://github.com/localgod/karla Karla
 * @since    2012-04-05
 */
namespace Karla;

/**
 * Interface for Karla caching tools
 *
 * @category Utility
 * @author   Johannes Skov Frandsen <localgod@heaven.dk>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT
 * @link     https://github.com/localgod/karla Karla
 */
interface Cache
{

    /**
     * Check if there exists a cached version of the file
     *
     * @param string $filename
     *            Path to file
     * @param string $options
     *            Options
     *
     * @return void
     */
    public function isCached($filename, $options);

    /**
     * Get cached version of the file
     *
     * @param string $filename
     *            Path to file
     * @param string $options
     *            Options
     *
     * @return string
     */
    public function getCached($filename, $options);

    /**
     * Set cached version of the file
     *
     * @param string $filename
     *            Path to file
     * @param string $options
     *            Options
     *
     * @return void
     */
    public function setCache($filename, $options);

    /**
     * Remove orphants cached version of the file
     *
     * @param string $filename
     *            Path to file
     * @param string $options
     *            Options
     *
     * @return void
     */
    public function removeOrphans($filename, $options);
}