import store from "../store/store";

export default (to, from, next) => {
    if (store.getters.isLoggedIn && store.getters.authUser.role_id === 1) {
        return next();
    } else {
        try {
            return next({to: store.state.route.from.fullPath});
        } catch(e){
            return next({name: 'home'})
        }
    }
}
