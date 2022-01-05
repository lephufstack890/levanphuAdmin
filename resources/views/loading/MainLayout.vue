<template>
  <q-layout  view="hHh lpR fff">
    <q-resize-observer @resize="onResize" />
    <q-header reveal class="bg-dark text-white">
      <q-toolbar>
        <q-btn flat to="/">
          <q-avatar square size="60px">
            <img src="../assets/logo/logo_1.svg" />
          </q-avatar>
        </q-btn>
        <q-toolbar-title v-if="report > 768">
          <q-tabs inline-label class="text-white">
            <q-btn
              v-for="item in listMenu"
              :key="item.id"
              flat
              :icon="item.icon"
              :to="item.to"
              :label="item.label"
            />
          </q-tabs>
        </q-toolbar-title>
        <div v-if="report > 1024 && report > 768" id="for_user">
          <q-btn round flat class="q-mx-sm" @click="open('top')" icon="fas fa-search" />
          <q-btn round flat class="q-mx-sm" icon="fas fa-shopping-cart" />
          <q-btn round flat class="q-mx-sm" icon="fas fa-user" />
          <q-btn round flat class="q-mx-sm" icon="fas fa-headset" />
        </div>
        <q-space v-if="report < 769" />
        <q-btn
          v-if="report < 769"
          dense
          flat
          round
          icon="menu"
          @click="toggleRightDrawer"
        />
      </q-toolbar>
    </q-header>

    <q-drawer v-model="rightDrawerOpen" class="bg-white" side="right" overlay>
      <div class="row flex flex-center q-mb-md bg-dark q-pa-md">
        <img style="width: 80%" src="../assets/logo/logo_1.svg" />
      </div>
      <div class="row q-pl-md">
        <q-btn
          v-for="item in listMenu"
          :key="item.id"
          flat
          :icon="item.icon"
          :to="item.to"
          :label="item.label"
        />
      </div>
    </q-drawer>

    <q-page-container >
      <router-view />
    </q-page-container>

    <q-page-sticky v-if="report < 1025" position="bottom-right" :offset="fabPos">
      <q-fab
        icon="add"
        direction="up"
        color="accent"
        :disable="draggingFab"
        v-touch-pan.prevent.mouse="moveFab"
      >
        <q-fab-action
          @click="open('top')"
          color="primary"
          icon="fas fa-search"
          :disable="draggingFab"
        />
        <q-fab-action
          @click="onClick"
          color="primary"
          icon="fas fa-shopping-cart"
          :disable="draggingFab"
        />
        <q-fab-action
          @click="onClick"
          color="primary"
          icon="fas fa-user"
          :disable="draggingFab"
        />
        <q-fab-action
          @click="onClick"
          color="primary"
          icon="fas fa-headset"
          :disable="draggingFab"
        />
      </q-fab>
    </q-page-sticky>
    <!-- dialog -->

    <q-dialog v-model="dialog" :position="position">
      <q-card style="width: 100%" class="bg-dark">
        <q-card-section class="row items-center no-wrap">
          <q-input
            placeholder="Bạn Muốn Tìm Gì"
            style="width: 100%; font-size: 20px"
            color="white"
            input-class="text-white"
            autofocus
            rounded
            outlined
            v-model="text"
          >
            <template v-slot:append>
              <q-avatar square>
                <img src="../assets/logo/logo_1.svg" />
              </q-avatar>
            </template>
          </q-input>
        </q-card-section>
      </q-card>
    </q-dialog>
    <!--  -->
    <q-footer elevated class="bg-grey-8 text-white">
      <q-toolbar>
        <q-toolbar-title>
          <q-space />
          <q-avatar square>
            <img src="../assets/logo/logo_1.svg" />
          </q-avatar>
        </q-toolbar-title>
      </q-toolbar>
    </q-footer>
  </q-layout>
</template>

<script>
import { ref } from "vue";
import { mapGetters } from "vuex";

export default {
  computed: {
    ...mapGetters("layout", ["listMenu"]),
  },
  setup() {
    const rightDrawerOpen = ref(false);
    const report = ref(null);
    const fabPos = ref([50, 50]);
    const draggingFab = ref(false);
    const dialog = ref(false);
    const position = ref("top");

    return {
      report,
      rightDrawerOpen,
      fabPos,
      draggingFab,
      dialog,
      text: ref(""),
      position,

      toggleRightDrawer() {
        rightDrawerOpen.value = !rightDrawerOpen.value;
      },
      onResize(size) {
        report.value = size.width;
      },
      moveFab(ev) {
        draggingFab.value = ev.isFirst !== true && ev.isFinal !== true;
        fabPos.value = [fabPos.value[0] - ev.delta.x, fabPos.value[1] - ev.delta.y];
      },
      onClick() {
        // console.log("Clicked on a fab action");
      },
      open(pos) {
        position.value = pos;
        dialog.value = true;
      },
    };
  },
};
</script>
