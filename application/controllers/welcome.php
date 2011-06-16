<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function index() {
        $coursesModel = new Courses();
        $coursesList = $coursesModel->getAllCourses();

        $lorem = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla libero neque, dictum ac adipiscing non, auctor at justo. Mauris sit amet enim tortor, nec porta quam. In posuere tempus eros, consequat congue diam imperdiet tristique. Maecenas ipsum arcu, porta a congue sit amet, convallis sed massa. Cras eros libero, dictum non gravida non, sagittis et ligula. Aenean in ligula eget odio cursus egestas vitae vel nisi. Maecenas a augue metus, ac egestas nulla. Suspendisse ac mauris tortor, eget condimentum ligula. Duis dolor diam, sagittis vel egestas nec, sollicitudin rutrum lectus. Donec et tellus et tortor cursus sollicitudin in et odio. Aenean sit amet diam sapien. Integer ut tellus nec quam dignissim pellentesque ut at nulla. Nullam et eros nibh. Proin vitae arcu ac ligula fermentum pellentesque a quis nulla. Sed venenatis consectetur mattis. Proin id neque orci.

Donec sit amet dolor non arcu elementum faucibus. Nam consequat magna ac nunc faucibus vitae dignissim velit hendrerit. Curabitur vitae sapien vitae elit pellentesque sagittis sed eget justo. Phasellus a nisi mi. Mauris condimentum, quam id elementum consequat, libero sem venenatis tellus, in dapibus libero purus a orci. Praesent vel accumsan ligula. Sed rutrum fermentum scelerisque. Integer turpis lacus, luctus sit amet convallis eu, ultrices ac lorem. Nam et dolor eros. Maecenas eget urna mi. Aliquam erat volutpat. Curabitur vel mauris metus, sed condimentum quam. Vestibulum arcu mauris, posuere nec molestie nec, ornare et velit.

Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla facilisi. Etiam eu eros turpis, sed tempus nisl. Nullam ut ante lacus. Nam sit amet commodo augue. Etiam eget augue non felis fringilla bibendum. Duis et magna ligula. Ut at nisl diam, eget adipiscing tortor. Cras dignissim consequat viverra. Donec porttitor vestibulum elit, quis ultricies nisl condimentum eget. Ut imperdiet, dui sed pulvinar cursus, tellus orci iaculis nibh, in molestie tellus nisl non urna.

Morbi ornare turpis at elit fermentum ut placerat velit mollis. Donec ac orci nec ipsum euismod malesuada et mattis orci. Suspendisse ante mauris, suscipit ut porttitor nec, luctus porttitor turpis. Morbi nec leo at massa ullamcorper dictum. Aliquam gravida libero id dui tempor eu elementum libero hendrerit. Vivamus lacinia porta leo, ut auctor purus congue non. Suspendisse eget nibh risus. Nunc nec metus mi, ac fermentum nulla. Etiam pharetra nisl et tellus consectetur eleifend. Ut sed malesuada justo. Vivamus pretium facilisis turpis. Curabitur quis turpis augue, convallis placerat ipsum. Curabitur et libero luctus sapien eleifend pellentesque. Mauris blandit ullamcorper turpis, eu elementum ipsum porttitor ac. Aenean fermentum vehicula libero, ac malesuada est tincidunt ac. Etiam quis hendrerit tortor. Proin vitae erat consectetur neque consequat pulvinar.

Duis suscipit libero nec mauris vestibulum laoreet. Suspendisse lobortis bibendum felis, id porta sem tincidunt at. Phasellus leo magna, viverra id suscipit in, varius in metus. Nunc gravida tincidunt eros et lacinia. Suspendisse potenti. Donec congue porttitor lectus, sed ullamcorper neque consequat condimentum. Mauris ligula quam, ornare at posuere at, vulputate ut lorem. Proin blandit magna vel metus iaculis semper. Curabitur eleifend euismod metus blandit molestie. Fusce non lorem libero. Nulla ac lorem sed nunc porta euismod sit amet ac erat. Cras ante est, porttitor et sollicitudin a, vehicula ac velit. Integer eget facilisis orci. Integer in metus nibh. Vivamus at ante sem, sed volutpat massa. ';

        $data = array(
            'leftColumn' => $coursesList,
            'content' => $lorem,
            'rightColumn' => $lorem,
        );

        $this->load->view('template/welcome', $data);
    }

}