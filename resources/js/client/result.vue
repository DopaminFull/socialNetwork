<template>
  <div>
    <div class="row w-75 border-top p-3 mx-auto mt-3">
      <div class="col-lg-7 col-md-7 col-sm-12">
        <h4 class="mb-2">Reference:</h4>
        <h4 class="mb-2">Matricule:</h4>
        <h4 class="mb-2">Date Sinistre:</h4>
        <h4 class="mb-2">Date Reception:</h4>
      </div>
      <div class="col-lg-5 col-md-5 col-sm-12">
        <h4 class="mb-2 font-weight-light" v-text="dossier.ref"></h4>
        <h4 class="mb-2 font-weight-light" v-text="dossier.matricule"></h4>
        <h4 class="mb-2 font-weight-light" v-text="dossier.date_sinistre"></h4>
        <h4 class="mb-2 font-weight-light" v-text="dossier.date_reception"></h4>
      </div>
    </div>
    <div class="container py-2 mt-4 mb-4">
      <div class="row">
        <div class="col-auto text-center flex-column d-none d-sm-flex">
          <div class="row h-50">
            <div class="col">&nbsp;</div>
            <div class="col">&nbsp;</div>
          </div>
          <h5 class="m-2">
            <span class="badge badge-pill bg-light border">&nbsp;</span>
          </h5>
          <div class="row h-50">
            <div class="col border-right">&nbsp;</div>
            <div class="col">&nbsp;</div>
          </div>
        </div>

        <div class="col py-2">
          <div class="card">
            <div class="card-body">
              <p
                class="card-text"
              >Welcome to the campus, introduction and get started with the tour.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-auto text-center flex-column d-none d-sm-flex">
          <div class="row h-50">
            <div class="col border-right">&nbsp;</div>
            <div class="col">&nbsp;</div>
          </div>
          <h5 class="m-2">
            <span class="badge badge-pill bg-success">&nbsp;</span>
          </h5>
          <div class="row h-50">
            <div class="col border-right">&nbsp;</div>
            <div class="col">&nbsp;</div>
          </div>
        </div>
        <div class="col py-2">
          <div class="card border-success shadow">
            <div class="card-body">
              <p
                class="card-text"
              >Sign-up for the lessons and speakers that coincide with your course</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-auto text-center flex-column d-none d-sm-flex">
          <div class="row h-50">
            <div class="col border-right">&nbsp;</div>
            <div class="col">&nbsp;</div>
          </div>
          <h5 class="m-2">
            <span class="badge badge-pill bg-light border">&nbsp;</span>
          </h5>
          <div class="row h-50">
            <div class="col border-right">&nbsp;</div>
            <div class="col">&nbsp;</div>
          </div>
        </div>
        <div class="col py-2">
          <div class="card">
            <div class="card-body">
              <p>Shoreditch vegan artisan Helvetica.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-auto text-center flex-column d-none d-sm-flex">
          <div class="row h-50">
            <div class="col border-right">&nbsp;</div>
            <div class="col">&nbsp;</div>
          </div>
          <h5 class="m-2">
            <span class="badge badge-pill bg-light border">&nbsp;</span>
          </h5>
          <div class="row h-50">
            <div class="col">&nbsp;</div>
            <div class="col">&nbsp;</div>
          </div>
        </div>
        <div class="col py-2">
          <div class="card">
            <div class="card-body">
              <p>Join us for lunch in Bootsy's cafe across from the Campus Center.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    dossier: {
      type: Object
    }
  }
};
</script>