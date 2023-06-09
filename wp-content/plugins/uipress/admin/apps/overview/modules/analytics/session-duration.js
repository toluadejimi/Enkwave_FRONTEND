export function moduleName() {
  return "session-duration";
}

export function moduleData() {
  return {
    props: {
      cardData: Object,
      dateRange: Object,
      translations: Object,
      editingMode: Boolean,
      premium: Boolean,
      analytics: Boolean,
    },
    data: function () {
      return {
        cardOptions: this.cardData,
        loading: true,
        numbers: [],
        startDate: this.dateRange.startDate,
        GAaccount: this.analytics,
      };
    },
    mounted: function () {
      this.loading = false;
      this.getData();
    },
    watch: {
      dateRange: function (newValue, oldValue) {
        if (newValue.startDate != oldValue.startDate || newValue.endDate != oldValue.endDate) {
          this.getData();
        }
      },
    },
    computed: {
      getTheDates() {
        return this.dateRange;
      },
      isGAconnected() {
        return this.analytics;
      },
      getPostsOnce() {
        this.getPosts();
      },
      formattedPosts() {
        this.getPostsOnce;
        return this.recentPosts;
      },
      getTheType() {
        let self = this;
        if (self.cardOptions.chartType) {
          return self.cardOptions.chartType;
        } else {
          return "line";
        }
      },
      daysDif() {
        self = this;
        var b = moment(self.dateRange.startDate);
        var a = moment(self.dateRange.endDate);
        return a.diff(b, "days") + 1;
      },
    },
    methods: {
      getData() {
        let self = this;
        self.loading = true;

        if (!self.isGAconnected) {
          self.loading = false;
          return;
        }

        jQuery.ajax({
          url: uipress_overview_ajax.ajax_url,
          type: "post",
          data: {
            action: "uipress_analytics_get_session_duration",
            security: uipress_overview_ajax.security,
            dates: self.getTheDates,
          },
          success: function (response) {
            var responseData = JSON.parse(response);

            if (responseData.noaccount) {
              ///SOMETHING WENT WRONG
              self.GAaccount = false;
              self.loading = false;
              return;
            }

            self.GAaccount = true;
            self.loading = false;
            self.numbers = responseData.numbers;
          },
        });
      },
    },
    template:
      '<div class="uip-padding-s uip-position-relative" :accountConnected="isGAconnected">\
	  	<loading-placeholder v-if="loading == true"></loading-placeholder>\
      <premium-overlay v-if="!premium" :translations="translations"></premium-overlay>\
      <connect-google-analytics @account-connected="getData()" :translations="translations" v-if="loading != true && !isGAconnected"></connect-google-analytics>\
      <div v-if="loading != true && isGAconnected" class="uk-grid uk-grid-small">\
        <div class="uip-flex uip-flex-center uip-margin-bottom-s">\
            <div class="uip-margin-right-s uip-text-xxl uip-text-emphasis uip-text-bold">{{numbers.total}}</div>\
            <div class="uip-background-primary-wash uip-border-round uip-padding-xxs uip-text-bold uip-flex" :class="{\'uip-background-red-wash\' : numbers.change < 0}">\
              <span v-if="numbers.change > 0" class="material-icons-outlined" >expand_less</span>\
              <span v-if="numbers.change < 0" class="material-icons-outlined" >expand_more</span>\
              {{numbers.change}}%\
            </div>\
          </div>\
        <div >\
            <div class="uip-text-muted">{{translations.vsPrevious}} {{daysDif}} {{translations.vsdays}} ({{numbers.total_comparison}})</div>\
        </div>\
      </div>\
		 </div>',
  };
  return compData;
}

export default function () {
  console.log("Loaded");
}
