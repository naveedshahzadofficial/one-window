import {createStore} from "vuex";
//import currentUser from "./modules/currentUser";
import department from "./modules/department";
import business from "./modules/business";
import activity from "./modules/activity";


export const store = createStore({
    state: { // data
        app_title: 'SMEDA - One Window',
        show_content: !!localStorage.getItem("authToken"),

    },
    getters: { // computed properties

    },
    actions: { // methods

    },
    mutations: { // used for changing the state

    },
    modules: {
        //currentUser,
        department,
        business,
        activity,
    }
})
