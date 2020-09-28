<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function GuzzleHttp\Promise\all;

class Menu extends Model
{
  use HasFactory;
  protected $table = 'menu';
  protected $fillable = ['name', 'url', 'icon'];
  protected $guarded = ['id'];

  /**
   * Este metodo se encarga de seleccionar solo aquellas
   * tuplas que no tiene asignada un padre y retorna un array
   */
  public function getRootMenus()
  {
    return $this->whereNull('father_id')
      ->orderBy('order')
      ->get()
      ->toArray();
  }

  /**
   * Este metodo recupera todas las tuplas 
   * que ya tienen asignado un padre ordenados 
   * por el id del padre y el campó order
   */
  public function getAllChildrenMenus()
  {
    return $this->whereNotNull('father_id')
      ->orderBy('father_id')
      ->orderBy('order')
      ->get()
      ->toArray();
  }

  /**
   * Recupera del listado de hijos los hijos del padre pasado
   * como parametro y tambien recupera los hijos de los hijos
   * Es una funcion recursiva
   * @param {object} $father es un padre root
   * @param {array} $children es un array con todos los hijos de la tabla menú
   */
  public function getChildrenOf($father, $childrenMenus)
  {
    $children = [];
    foreach ($childrenMenus as $son) {
      if ($son['father_id'] === $father['id']) {
        $childrenOfSon = $this->getChildrenOf($son, $childrenMenus);
        $children = array_merge($children, [array_merge($son, ['submenus' => $childrenOfSon])]);
      } //end of if
    } //end of foreach
    return $children;
  } //Fin del metodo

  /**
   * Recupera el listado de menus principal con todos 
   * los submenus
   */
  public static function getMenus()
  {
    $allMenus = [];                           //Para guadar los resultados
    $menu = new Menu();
    //Ahora recupero todos los menus raiz
    $parents = $menu->getRootMenus();           //El listado raiz a recorrer
    $allChildren = $menu->getAllChildrenMenus();   //El listado de hijos

    foreach ($parents as $father) {
      $children = $menu->getChildrenOf($father, $allChildren);
      $item = [array_merge($father, ['submenus' => $children])];
      $allMenus = array_merge($allMenus, $item);
    }

    return $allMenus;
  }

  /**
   * Guardo el orden de los menus hasta cuatro niveles
   */
  public function saveOrder($menus)
  {
    $menus = json_decode($menus);
    foreach ($menus as $var => $value) {
      $this->where('id', $value->id)->update(['father_id' => null, 'order' => $var + 1]);
      //Se accede al primer nivel
      if (!empty($value->children)) {
        foreach ($value->children as $key => $vchild1) {
          $update_id = $vchild1->id;
          $parent_id = $value->id;
          $this->where('id', $update_id)->update(['father_id' => $parent_id, 'order' => $key + 1]);
          // Se accede al segundo nivel
          if (!empty($vchild1->children)) {
            foreach ($vchild1->children as $key => $vchild2) {
              $update_id = $vchild2->id;
              $parent_id = $vchild1->id;
              $this->where('id', $update_id)->update(['father_id' => $parent_id, 'order' => $key + 1]);
              //Se accede al tercer nivel
              if (!empty($vchild2->children)) {
                foreach ($vchild2->children as $key => $vchild3) {
                  $update_id = $vchild3->id;
                  $parent_id = $vchild2->id;
                  $this->where('id', $update_id)->update(['father_id' => $parent_id, 'order' => $key + 1]);
                  //Se accede al cuarto nivel
                  if (!empty($vchild3->children)) {
                    foreach ($vchild3->children as $key => $vchild4) {
                      $update_id = $vchild4->id;
                      $parent_id = $vchild3->id;
                      $this->where('id', $update_id)->update(['father_id' => $parent_id, 'order' => $key + 1]);
                    } //end foreach
                  } //end if
                } //end foreach
              } //end if
            } //end foreach
          } //end if
        } //end foreach
      } //end if
    } //end foreach
  }
}//Fin de la clase
