import auth from "../middleware/auth";
import admin from "../middleware/admin";
import guest from "../middleware/guest";
import Home from '../pages/Home';
import Login from '../pages/auth/Login';
import Register from '../pages/auth/Register';
import AdminUsersIndex from '../pages/admin/AdminUsersIndex';
import UsersIndex from '../pages/users/UsersIndex';
import UsersShow from '../pages/users/UsersShow';
import Route from 'vue-routisan';

// define view resolver
// Route.setViewResolver((c) => require('./views/' + c));

/*
 * Guest Routes
 */
Route.group({ beforeEnter: guest }, () => {
    Route.view('/login', Login).name('login');
    Route.view('/register', Register).name('register');
    // Route.view('/forgot', 'Forgot');
    // Route.view('reset', 'Reset');
});

/*
 * Auth Routes
 */
Route.group({ beforeEnter: auth}, () => {
    Route.view('/', Home).name('home');

    Route.group({prefix: '/users'}, () => {
        Route.view('/', UsersIndex).name('users.index');
        Route.view(':id', UsersShow).name('users.show');
    });

    /*
     * Admin Routes
     */
    Route.group({ prefix: '/admin', beforeEnter: admin}, () => {

        Route.group({prefix: '/users'}, () => {
            Route.view('/', AdminUsersIndex).name('admin.users.index');
            // Route.view(':id', UsersShow).name('users.show');
        });
    });
});

export default Route.all();

/*
export default [
    {
        beforeEnter: guest,
        path: '/login',
        name: 'login',
        component: Login
    },
    {
        beforeEnter: guest,
        path: '/register',
        name: 'register',
        component: Register
    },
    {
        beforeEnter: auth,
        path: '/',
        name: 'home',
        component: Home,
    },
    {
        beforeEnter: admin,
        path: '/users',
        component: UsersWrapper,
        children: users
    },
    {
        beforeEnter: auth,
        path: '/user_profiles',
        component: UsersWrapper,
        children: userProfiles
    },
    {
        path: '*',
        redirect: '/'
    }
];
*/