<template>
  <div class="form join-form">
    <form name="joinFrm" @submit.prevent="submitFrm" method="post">
      <div class="join-form__wrap">
        <div class="join-form__terms">
          <textarea v-model="privacyTermText" readonly></textarea>
          <label>
            <input type="checkbox" v-model="form.agreePrivacy" :readonly="formSend">
            개인 정보 수집 동의
          </label>
        </div>
        <div class="join-form__terms">
          <textarea v-model="artistTermText" readonly></textarea>
          <label>
            <input type="checkbox" v-model="form.agreeArtist" :readonly="formSend">
            소속 작가 동의서
          </label>
        </div>
        <div class="join-form__input">
          <label class="form__field">
            <p class="form__label form__label--required">성명</p>
            <text-input v-model="form.name" :required="true" :readonly="formSend"></text-input>
          </label>
          <label class="form__field">
            <p class="form__label">작가명</p>
            <text-input v-model="form.artistName" :readonly="formSend"></text-input>
          </label>
          <label class="form__field join-form__school">
            <p class="form__label form__label--required">학교</p>
            <div class="form__field__wrap-input">
              <text-input v-model="form.school" :required="true" :readonly="formSend"></text-input>
              <p class="form__field__wrap-input__subtxt">*최종 졸업 학교 기입</p>
            </div>
          </label>
          <label class="form__field">
            <p class="form__label form__label--required">학년</p>
            <select-input v-model="form.grade" :options="gradeSelect" :required="true" :readonly="formSend"></select-input>
          </label>
          <label class="form__field">
            <p class="form__label">단과대</p>
            <text-input v-model="form.college" :readonly="formSend"></text-input>
          </label>
          <label class="form__field">
            <p class="form__label form__label--required">학과</p>
            <text-input v-model="form.major" :required="true" :readonly="formSend"></text-input>
          </label>
          <label class="form__field join-form__artist">
            <p class="form__label form__label--required">작가 활동 범위</p>
            <div class="form__field__wrap-input">
              <select-input v-model="form.artist[0]" :options="artistSelect" :required="true" :readonly="formSend"></select-input>
              <select-input v-model="form.artist[1]" :options="artistSelect" :readonly="formSend"></select-input>
              <select-input v-model="form.artist[2]" :options="artistSelect" :readonly="formSend"></select-input>
            </div>
          </label>
          <label class="form__field join-form__email">
            <p class="form__label form__label--required">이메일</p>
            <text-input v-model="form.email[0]" :required="true" :readonly="formSend"></text-input>
            <span>@</span>
            <text-input v-if="changeEmailDomain" v-model="form.email[2]" :placeholder="`직접 입력`" :required="true" :readonly="formSend"></text-input>
            <select-input v-else v-model="form.email[1]" :options="emailSelect" :required="true" :readonly="formSend"></select-input>
          </label>
          <label class="form__field join-form__tel">
            <p class="form__label form__label--required">연락처</p>
            <text-input v-model="form.phone" :required="true" :readonly="formSend"></text-input>
          </label>
          <label class="form__field join-form__attach">
            <p class="form__label form__label--required">파일 첨부</p>
            <input ref="inputFile" type="file" @change="getFile" :required="true" :readonly="formSend">
            <p class="join-form__attach__subtxt">*학생증 및 재학증명서, 졸업증명서 이미지 파일 또는 PDF파일을 첨부해주세요</p>
          </label>
        </div>
      </div>
      <button-input :type="'submit'" :readonly="formSend">전송</button-input>
    </form>
  </div>
</template>

<script>
import TextInput from '../components/TextInput'
import SelectInput from '../components/SelectInput'
import ButtonInput from '../components/ButtonInput'

import privacyTermText from 'raw-loader!../assets/terms/privacy-term.txt'
import artistTermText from 'raw-loader!../assets/terms/artist-term.txt'

import axios from 'axios'

export default {
  components: {
    TextInput,
    SelectInput,
    ButtonInput,
  },
  data() {
    return {
      privacyTermText,
      artistTermText,
      gradeSelect: [
        '1학년',
        '2학년',
        '3학년',
        '4학년',
        '졸업생',
        '대학원생',
        '휴학생',
        '자퇴생'
      ],
      artistSelect: [
        '일러스트',
        '디지털 아트',
        '게임 아트',
        '순수 예술',
        '회화',
        '조형',
        '가구',
        '도예',
        '기타',
        '해당 없음',
      ],
      emailSelect: [
        'naver.com',
        'gmail.com',
        'daum.net',
        'hanmail.net',
        'nate.com',
        '직접 입력'
      ],
      form: {
        agreePrivacy: false,
        agreeArtist: false,
        name: '',
        artistName: '',
        school: '',
        grade: '',
        college: '',
        major: '',
        artist: [],
        email: [],
        phone: '',
        file: null,
        mailTo: process.env.NODE_ENV === 'development' 
          ? 'sh.kim@weballin.com' : 'master@artudent.co.kr',
      },
      formValid: false,
      formSend:false,
    }
  },
  methods: {
    getFile(event) {
      const files = event.target.files;
      if (!files.length)
        return false;
      this.form.file = files[0];
    },
    validationFrm() {
      this.formValid = false;

      if (!this.form.name) {
        alert('성명을 입력해주세요');
      } else if (!this.form.school) {
        alert('학교를 입력해주세요');
      } else if (!this.form.grade) {
        alert('학년을 입력해주세요');
      } else if (!this.form.major) {
        alert('학과를 입력해주세요');
      } else if (!this.form.artist[0]) {
        alert('작가 활동 범위를 선택해주세요');
      } else if (!this.form.email[0] || 
        (!this.form.email[1] && !this.changeEmailDomain) ||
        (!this.form.email[2] && this.changeEmailDomain)) {
        alert('이메일을 입력해주세요');
      } else if (!this.form.file) {
        alert('파일을 첨부해주세요');
      } else {
        this.formValid = true;
      }
    },
    resetFrm() {
      this.form.agreePrivacy = false,
      this.form.agreeArtist = false,
      this.form.name = '',
      this.form.artistName = '',
      this.form.school = '',
      this.form.grade = '',
      this.form.college = '',
      this.form.major = '',
      this.form.artist = [],
      this.form.email = [],
      this.form.phone = '',
      this.form.file = null,
      this.formValid = false
    },
    submitFrm() {
      this.validationFrm();
      
      if (this.formValid && !this.formSend) {
        this.formSend = true;
        const url = process.env.NODE_ENV === 'development' ? 
          "http://sample.fnf-network.com/mail/php_mailer/send-mail.php" :
          "http://artudent.co.kr/lib/php_mailer/send-mail.php";

        axios.post(url, this.setFormData(), { headers: { 'Content-Type': 'multipart/form-data' } })
          .then(({data}) => {
            if (data.err) {
              alert(data.err);
            } else if (data.success) {
              alert('문의가 접수되었습니다.');
              this.resetFrm();
              this.$refs.inputFile.value = null;
            }
            this.formSend = false;
          })
          .catch((err) => {
            alert('[서버 에러] 사이트 관리자에 문의 바랍니다.');
            console.log(err);
            this.formSend = false;
          })
      }
    },
    setFormData() {
      const form = new FormData();
      let artistData = '';

      for (let i in this.form.artist) {
        if (i > 0)
          artistData += ', ';  

        artistData += this.form.artist[i];
      }

      form.append('agreePrivacy', this.form.agreePrivacy == false ? 'no' : 'yes');
      form.append('agreeArtist', this.form.agreeArtist == false ? 'no' : 'yes');
      form.append('name', this.form.name);
      form.append('artistName', this.form.artistName);
      form.append('school', this.form.school);
      form.append('grade', this.form.grade);
      form.append('college', this.form.college);
      form.append('major', this.form.major);
      form.append('artist', artistData);  
      form.append('artist', this.form.artist);
      form.append('email', `${this.form.email[0]}@${this.changeEmailDomain ? this.form.email[2] : this.form.email[1]}`);      
      form.append('phone', this.form.phone);
      form.append('file', this.form.file);
      form.append('mailTo', this.form.mailTo);

      return form;
    }
  },
  computed: {
    changeEmailDomain() {
      return this.form.email[1] === '직접 입력' ? true : false;
    },
  }
}
</script>

<style lang="scss" scoped>
@import '@scss/layout/form.scss';
@import '@scss/components/join-form.scss';
</style>