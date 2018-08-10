<?php
if (!function_exists('load_dep')) {
    function load_dep($select = null)
    {
        $departments = \App\Models\Department::selectRaw('deb_name as text')->selectRaw('id as id')
            ->selectRaw('parent as parent')->get(['text', 'parent', 'id']);
        $dep_arr = [];
        foreach ($departments as $department) {
            $list_arr = [];
            if ($select !== null and $select == $department->id) {
                $list_arr['icon'] = '';
                $list_arr['li_attr'] = '';
                $list_arr['a_attr'] = '';
                $list_arr['children'] = [];
                $list_arr['state'] = [
                    'opened' => true,
                    'selected' => true
                ];
            }
            $list_arr['id'] = $department->id;
            $list_arr['parent'] = $department->parent > 0 ? $department->parent : '#';
            $list_arr['text'] = $department->text;
            array_push($dep_arr, $list_arr);
        }
        return json_encode($dep_arr);
    }
}