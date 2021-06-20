<?

namespace Wails\Core;

interface CRUDInterface
{

    public function create(array $args) : object;

    public function retrieve(int $id) : object;

    public function update(int $id) : bool;

    public function delete(int $id) : bool;

}