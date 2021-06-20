<?

namespace Wails\Core;

interface RepositoryInterface
{

    public function getAll() : array;

    public function getAllBy(array $args) : array;

}