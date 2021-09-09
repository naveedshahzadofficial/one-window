const state = {
    departments: [],
}

const getters = {}

const actions = {
    getDepartment(context) {
        context.commit('setDepartment')
    }
}

const mutations = {
    setDepartment(state) {
        axios.get('/api/v1/department_list').then(response => {
            state.departments = response.data.departments
        });
    }
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};
